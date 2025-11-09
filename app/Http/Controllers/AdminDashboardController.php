<?php

namespace App\Http\Controllers;

use App\Models\CloseKasChild;
use App\Models\CloseKasParent;
use App\Models\Kas;
use App\Models\KasPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
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

        return view('admin.dashboard', compact("total", "totalClosing"));
    }

    public function pengajuanKas()
    {
        $cash = Kas::all();
        return view('admin.pengajuan', compact('cash'));
    }

    public function addPengajuan(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            "nominal" => "required",
        ]);

        if ($validateData->fails()) {
            return redirect()->route("adminPengajuan")->with([
                "route" => route("adminPengajuan"),
                "icon" => "error",
                "message" => "Data Harus Diisi!"
            ]);
        }

        Kas::create([
            "nominal" => $request->nominal,
            "status" => "pending",
            "notes" => "-"
        ]);

        return redirect()->route("adminPengajuan")->with([
            "route" => route("adminPengajuan"),
            "icon" => "success",
            "message" => "Data Berhasil Ditambah!"
        ]);
    }

    public function pengelolaanKas()
    {
        $credit = KasPayment::all()->pluck("credit")->sum();
        $debit = KasPayment::all()->pluck("debit")->sum();

        $closindCredit = CloseKasParent::all()->pluck("total_credit")->sum();
        $closindDebit = CloseKasParent::all()->pluck("total_debit")->sum();
        
        $cash = Kas::where('status', 'accepted')->sum('nominal');

        $total = $closindDebit + $cash - $closindCredit;
        $totalClosing = ($closindDebit - $closindCredit) + ($debit + $cash - $credit);
        $listPayment = KasPayment::orderBy("created_at", "DESC")->get();

        return view('admin.pengelolaan', compact("total", "totalClosing", "debit", "credit", "listPayment"));
    }

    public function print(string $id)
    {
        $data = KasPayment::findOrFail($id);
        return view('admin.print', compact('data'));
    }

    public function addCredit(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            "type_payment" => "required",
            "date" => "required",
            "desc" => 'required',
        ]);

        if ($validateData->fails()) {
            return redirect()->route("adminPengelolaan")->with([
                "route" => route("adminPengelolaan"),
                "icon" => "error",
                "message" => "Data Harus Diisi!"
            ]);
        }

        $path = null;
        if ($request->hasFile("image")) {
            $path = Storage::disk("public")->putFile("credit", $request->image);
        }

        KasPayment::create([
            "credit" => $request->credit,
            "debit" => 0,
            "type_payment" => $request->type_payment,
            "proof_payment" => $path,
            "desc" => $request->desc,
            "date" => $request->date,
            "notes" => $request->notes ?? "-"
        ]);

        return redirect()->route("adminPengelolaan")->with([
            "route" => route("adminPengelolaan"),
            "icon" => "success",
            "message" => "Data Berhasil Ditambah!"
        ]);
    }

    public function addDebit(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            "type_payment" => "required",
            "date" => 'required',
            "desc" => 'required',
        ]);

        if ($validateData->fails()) {
            return redirect()->route("adminPengelolaan")->with([
                "route" => route("adminPengelolaan"),
                "icon" => "error",
                "message" => "Data Harus Diisi!"
            ]);
        }

        $path = null;
        if ($request->hasFile("image")) {
            $path = Storage::disk("public")->putFile("credit", $request->image);
        }

        KasPayment::create([
            "credit" => 0,
            "debit" => $request->debit,
            "type_payment" => $request->type_payment,
            "proof_payment" => $path,
            "desc" => $request->desc,
            "date" => $request->date,
            "notes" => $request->notes ?? "-"
        ]);

        return redirect()->route("adminPengelolaan")->with([
            "route" => route("adminPengelolaan"),
            "icon" => "success",
            "message" => "Data Berhasil Ditambah!"
        ]);
    }

    public function closingKas()
    {
        $credit = KasPayment::all()->pluck("credit")->sum();
        $debit = KasPayment::all()->pluck("debit")->sum();

        $closindCredit = CloseKasParent::all()->pluck("total_credit")->sum();
        $closindDebit = CloseKasParent::all()->pluck("total_debit")->sum();
        
        $cash = Kas::where('status', 'accepted')->sum('nominal');

        $total = $closindDebit + $cash - $closindCredit;
        $totalClosing = ($closindDebit - $closindCredit) + ($debit + $cash - $credit);
        $listPayment = KasPayment::all();

        $cashParent = CloseKasParent::create([
            "opening_kas" => $total,
            "ending_kas" => $totalClosing,
            "total_debit" => $debit,
            "total_credit" => $credit,
        ]);

        for ($i=0; $i < count($listPayment); $i++) { 
            CloseKasChild::create([
                "kas_parent" => $cashParent->id,
                "credit" => $listPayment[$i]->credit,
                "debit" => $listPayment[$i]->debit,
                "type_payment" => $listPayment[$i]->type_payment,
                "proof_payment" => $listPayment[$i]->proof_payment,
                "desc" => $listPayment[$i]->desc,
                "date" => $listPayment[$i]->date,
                "notes" => $listPayment[$i]->notes,
            ]);
        }
            
        $listPayment->each->delete();
        return redirect()->route("adminPengelolaan")->with([
            "route" => route("adminPengelolaan"),
            "icon" => "success",
            "message" => "Closing Kas Berhasil!"
        ]);
    }

    public function report()
    {
        $closeKasParent = CloseKasParent::with('cashChild')->orderBy("created_at", "DESC")->get();
        return view('admin.report', compact('closeKasParent'));
    }

    public function reportPrint(string $id)
    {
        $parent = CloseKasParent::findOrFail($id);
        return view('admin.report-print', compact('parent'));
    }
}
