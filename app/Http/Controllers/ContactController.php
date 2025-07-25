<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $contacts = Contact::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('admin.contacts', ["contacts" => $contacts]);
    }
    public function create()
    {
        return view('public.contact');
    }
    public function store(Request $request)
    {
        if ($request->filled('website')) {
            abort(403);
        }
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
    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
