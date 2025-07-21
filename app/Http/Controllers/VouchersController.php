<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $vouchers = Voucher::with('reward')
            ->when($search, function ($query, $search) {
                $query->where('unique_code', 'like', "%{$search}%")
                    ->orWhereHas('reward', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.vouchers', ["vouchers" => $vouchers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vouchers-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "unique_code" => "required|string|max:5"
        ]);
        try {
            Voucher::create($validated);
            return redirect()->back()->with('success', 'Voucher berhasil ditambah!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Voucher gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $vouchers = Voucher::findOrFail($id);
            $vouchers->delete();
            return redirect()->back()->with('success', 'Voucher berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Gagal tambah voucher: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Voucher gagal dihapus');
        }
    }
}
