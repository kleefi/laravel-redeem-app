<?php

namespace App\Http\Controllers;

use App\Models\Redeem;
use App\Models\Reward;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RedeemController extends Controller
{

    public function index()
    {
        $redeems = Redeem::with('reward')->paginate(10);
        return view('admin.redeems', ["redeems" => $redeems]);
    }
    public function create()
    {
        return view('public.redeem');
    }
    public function store(Request $request)
    {
        if ($request->filled('website')) {
            abort(403);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'province' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'unique_code' => 'required|string|unique:redeems,unique_code',
            'unique_code_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'source' => 'required|in:instagram,facebook,tikTok,lainnya',
        ], [
            'unique_code.unique' => 'Kode unik ini sudah pernah digunakan.',
            'unique_code_image.required' => 'Harap unggah foto kode unik.',
        ]);
        try {
            $path = $request->file('unique_code_image')->store('uploads', 'public');
            $validated['unique_code_image'] = $path;
            Redeem::create($validated);
            return redirect('/redeem')->with('success', 'Kode berhasil dikirim. Semoga beruntung!');
        } catch (\Exception $e) {
            return redirect('/redeem')->with('error', 'Kode gagal dikirim. Harap periksa lagi!');
        }
    }
    public function validateForm($id)
    {
        $redeem = Redeem::findOrFail($id);
        $rewards = Reward::all();
        return view('admin.redeems-validate', compact('redeem', 'rewards'));
    }

    public function doValidate(Request $request, $id)
    {
        $redeem = Redeem::findOrFail($id);

        $request->validate([
            'reward_id' => 'required|exists:rewards,id',
        ]);

        // Cari voucher dari kode unik
        $voucher = Voucher::where('unique_code', $redeem->unique_code)->first();

        if (!$voucher) {
            return back()->with('error', 'Voucher tidak ditemukan.');
        }

        if ($voucher->is_used) {
            return back()->with('error', 'Voucher sudah digunakan.');
        }

        // Tandai voucher sebagai digunakan
        $voucher->update([
            'is_used' => true,
            'reward_id' => $request->reward_id,
        ]);

        // Update redeem
        $redeem->update([
            'reward_id' => $request->reward_id,
            'voucher_id' => $voucher->id,
            'status' => 'done',
            'is_winner' => true,
            'selected_as_winner_at' => now(),
        ]);

        return redirect()->route('redeems.index')->with('success', 'Redeem divalidasi dan hadiah telah di-assign.');
    }
    public function validateUpdate(Request $request, Redeem $redeem)
    {
        $request->validate([
            'status' => 'required|in:pending,process,done',
            'reward_id' => 'nullable|exists:rewards,id',
            'admin_notes' => 'nullable|string',
        ]);

        // Ambil voucher berdasarkan unique_code dari redeem saat ini
        $voucher = Voucher::where('unique_code', $redeem->unique_code)->first();

        if (!$voucher) {
            return redirect()->back()->with('error', 'Unique code tidak ditemukan.');
        }

        // Cek apakah voucher ini sudah digunakan oleh redeem lain
        if ($voucher->is_used && $voucher->id !== $redeem->voucher_id) {
            return redirect()->back()->with('error', 'Unique code sudah digunakan oleh peserta lain.');
        }

        // Tandai voucher sebagai digunakan (kalau belum)
        if (!$voucher->is_used) {
            $voucher->is_used = true;
        }

        // Selalu update reward_id voucher agar sinkron
        $voucher->reward_id = $request->reward_id;
        $voucher->save();

        // Update data redeem
        $redeem->update([
            'status' => $request->status,
            'reward_id' => $request->reward_id,
            'admin_notes' => $request->admin_notes,
            'is_winner' => true,
            'selected_as_winner_at' => $redeem->selected_as_winner_at ?? now(), // jangan reset kalau sudah ada
            'voucher_id' => $voucher->id,
        ]);

        return redirect()->route('redeems.index')->with('success', 'Redeem berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $redeem = Redeem::findOrFail($id);
        $redeem->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus peserta');
    }
}
