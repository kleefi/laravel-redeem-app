<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:umum,teknis,lainnya',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);
        Contact::create($validated);
        try {
            return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ada kesalahan saat mengirim pesan.');
        }
    }
}
