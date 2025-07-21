<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Redeem;
use App\Models\Reward;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RedeemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $redeems = Redeem::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('unique_code', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
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
        if (!Voucher::where('unique_code', $validated['unique_code'])->exists()) {
            return redirect('/redeem')->withInput()->withErrors([
                'unique_code' => 'Kode unik tidak valid.',
            ]);
        }
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

        $voucher = Voucher::where('unique_code', $redeem->unique_code)->first();

        if (!$voucher) {
            return back()->with('error', 'Voucher tidak ditemukan.');
        }

        if ($voucher->is_used) {
            return back()->with('error', 'Voucher sudah digunakan.');
        }

        $voucher->update([
            'is_used' => true,
            'reward_id' => $request->reward_id,
        ]);

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

        // Simpan data lama untuk cek perubahan
        $old = $redeem->only(['status', 'reward_id', 'admin_notes']);

        // Update data redeem
        $redeem->update([
            'status' => $request->status,
            'reward_id' => $request->reward_id,
            'admin_notes' => $request->admin_notes,
            'is_winner' => true,
            'selected_as_winner_at' => $redeem->selected_as_winner_at ?? now(),
            'voucher_id' => $voucher->id,
        ]);

        // Bandingkan perubahan dan simpan log kalau ada yang berubah
        $changes = [];
        $actions = [];

        if ($old['status'] !== $request->status) {
            $changes['status'] = [$old['status'], $request->status];
            $actions[] = 'status';
        }

        if ($old['reward_id'] != $request->reward_id) {
            $changes['reward_id'] = [$old['reward_id'], $request->reward_id];
            $actions[] = 'reward';
        }

        if ($old['admin_notes'] !== $request->admin_notes) {
            $changes['admin_notes'] = [$old['admin_notes'], $request->admin_notes];
            $actions[] = 'note';
        }

        if (!empty($changes)) {
            Log::create([
                'user_id' => auth()->id(),
                'action' => 'update_redeem_' . implode('_', $actions), // contoh: update_redeem_status_reward
                'target_type' => 'Redeem',
                'target_id' => $redeem->id,
                'changes' => $changes,
            ]);
        }

        return redirect()->route('redeems.index')->with('success', 'Redeem berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $redeem = Redeem::findOrFail($id);

        // Hapus file gambar jika ada
        if ($redeem->unique_code_image && Storage::disk('public')->exists($redeem->unique_code_image)) {
            Storage::disk('public')->delete($redeem->unique_code_image);
        }

        // Logging sebelum delete
        Log::create([
            'user_id' => auth()->id(),
            'action' => 'delete_redeem',
            'target_type' => 'Redeem',
            'target_id' => $redeem->id,
            'changes' => null,
        ]);
        // Hapus dari database
        $redeem->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus peserta');
    }
}
