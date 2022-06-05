<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = "barang";
        $dataBarang = Barang::all();
        $dataKategori = Kategori::all();
        $dataSupplier = Supplier::all();
        return view("barang.barang", [
            "route" => $route,
            "dataBarang" => $dataBarang,
            "dataKategori" => $dataKategori,
            "dataSupplier" => $dataSupplier,
        ]);
    }
    public function store()
    {
        $data = request()->all();
        Barang::create($data);
        Session::flash("success", "Data berhasil ditambahkan!");
        return redirect("/barang");
    }
    public function destroy($id)
    {
        Barang::destroy($id);
        Session::flash("deleted", "Data berhasil dihapus!");
        return redirect("/barang");
    }
    public function update($id)
    {
        $data = request()->except(["_token", "_method"]);
        Barang::where("id", $id)->update($data);
        Session::flash("updated", "Data berhasil diupdate!");
        return redirect("/barang");
    }
    public function edit($id)
    {
        $dataBarang = Barang::find($id);
        $dataKategori = Kategori::all();
        $dataSupplier = Supplier::all();
        return view("barang.edit", [
            "route" => "edit",
            "dataBarang" => $dataBarang,
            "dataKategori" => $dataKategori,
            "dataSupplier" => $dataSupplier,
        ]);
    }
}