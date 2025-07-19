<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RewardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewards = Reward::paginate(10);
        return view('admin.rewards', ['rewards' => $rewards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rewards-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:50",
            "qty" => "required|integer:min:1",
            "desc" => "required|string|max:250"
        ]);

        try {
            Reward::create($validated);
            return redirect()->back()->with('success', 'Reward berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Gagal tambah reward: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Reward gagal ditambahkan');
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
        $rewards = Reward::findOrFail($id);
        return view('admin.rewards-form', ['rewards' => $rewards]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => "required|string|max:50",
            "qty" => "required|integer:min:1",
            "qty" => "required|integer|min:1",
            "desc" => "required|string|max:250"
        ]);

        try {
            $rewards = Reward::findOrFail($id);
            $rewards->update($validated);

            return redirect()->back()->with('success', 'Reward berhasil diupdate');
        } catch (\Exception $e) {
            Log::error('Gagal tambah reward: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Reward gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rewards = Reward::findOrFail($id);
            $rewards->delete();
            return redirect()->back()->with('success', 'Reward berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Gagal tambah reward: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Reward gagal dihapus');
        }
    }
}
