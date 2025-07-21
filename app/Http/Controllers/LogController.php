<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('user')->latest()->paginate(10);
        return view('admin.logs', ['logs' => $logs]);
    }
}
