<?php

namespace App\Http\Controllers;

use App\Models\Redeem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RedeemController extends Controller
{

    public function index()
    {
        $redeems = Redeem::paginate(10);
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
}
