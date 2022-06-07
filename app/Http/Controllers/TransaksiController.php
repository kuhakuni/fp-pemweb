<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $detailTransaksi = DetailTransaksi::all();
        return view("transaksi.index", [
            "route" => "transaksi",
            "dataDetailTransaksi" => $detailTransaksi,
            "title" => "Data Transaksi - NiceAdmin",
        ]);
    }
}