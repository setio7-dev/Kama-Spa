<?php

namespace App\Http\Controllers;

use App\Models\CloseKasParent;
use App\Models\Kas;
use App\Models\KasPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountingController extends Controller
{
    public function index()
    {
        $credit = KasPayment::all()->pluck("credit")->sum();
        $debit = KasPayment::all()->pluck("debit")->sum();

        $closindCredit = CloseKasParent::all()->pluck("total_credit")->sum();
        $closindDebit = CloseKasParent::all()->pluck("total_debit")->sum();
        
        $cash = Kas::where('status', 'accepted')->sum('nominal');

        $total = ($closindDebit - $closindCredit) + $debit + $cash - $credit;
        $totalClosing = $closindDebit + $cash - $closindCredit;

        return view('accounting.dashboard', compact("total", "totalClosing"));
    }

    public function dana()
    {
        $cash = Kas::all();
        return view('accounting.dana', compact('cash'));
    }

    public function status(Request $request, string $id)
    {
        $validateData = Validator::make($request->all(), [
            'notes' => 'required'
        ]);

        if ($validateData->fails()) {
            return redirect()->route("keuanganDana")->with([
                "route" => route("keuanganDana"),
                "icon" => "error",
                "message" => "Catatan Harus Diisi!"
            ]);
        }

        $cash = Kas::findOrFail($id);
        $cash->update([
            "notes" => $request->notes,
            "status" => $request->status
        ]);

        return redirect()->route("keuanganDana")->with([
            "route" => route("keuanganDana"),
            "icon" => "success",
            "message" => "Kas Berhasil Dikonfirmasi!"
        ]);    
    }
}
