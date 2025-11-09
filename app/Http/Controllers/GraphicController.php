<?php

namespace App\Http\Controllers;

use App\Models\KasPayment;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    public function index()
    {
        $cashPayment = KasPayment::all();
        return response()->json([
            "data" => $cashPayment
        ]);
    }
}
