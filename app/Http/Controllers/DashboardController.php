<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Redeem;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::count();
        $redeems = Redeem::count();
        $contactsThisMonth = Contact::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $contactsLastMonth = Contact::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();
        $redeemsThisMonth = Redeem::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $redeemsLastMonth = Redeem::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();
        return view('admin.dashboard', ['contacts' => $contacts, 'redeems' => $redeems, 'contactsThisMonth' => $contactsThisMonth, 'contactsLastMonth' => $contactsLastMonth, 'redeemsThisMonth' => $redeemsThisMonth, 'redeemsLastMonth' => $redeemsLastMonth]);
    }
}
