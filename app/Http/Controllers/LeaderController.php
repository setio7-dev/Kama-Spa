<?php

namespace App\Http\Controllers;

use App\Models\CloseKasParent;
use App\Models\Kas;
use App\Models\KasPayment;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        $credit = KasPayment::all()->pluck("credit")->sum();
        $debit = KasPayment::all()->pluck("debit")->sum();

        $closindCredit = CloseKasParent::all()->pluck("total_credit")->sum();
        $closindDebit = CloseKasParent::all()->pluck("total_debit")->sum();
        
        $cash = Kas::where('status', 'accepted')->sum('nominal');

        $total = ($closindDebit - $closindCredit) + ($debit + $cash - $credit);
        $totalClosing = $closindDebit + $cash - $closindCredit;

        return view('leader.dashboard', compact("total", "totalClosing"));
    }

    public function report()
    {
        $closeKasParent = CloseKasParent::with('cashChild')->orderBy("created_at", "DESC")->get();
        return view('leader.report', compact('closeKasParent'));
    }

    public function reportPrint(string $id)
    {
        $parent = CloseKasParent::findOrFail($id);
        return view('leader.report-print', compact('parent'));
    }
}
