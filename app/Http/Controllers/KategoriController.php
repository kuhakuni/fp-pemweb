<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function index()
    {
        $dataKategori = Kategori::all();
        $route = "kategori";
        return view("kategori.kategori", [
            "route" => $route,
            "dataKategori" => $dataKategori,
            "title" => "Data Kategori - NiceAdmin",
        ]);
    }
    public function store()
    {
        $data = request()->all();
        Kategori::create($data);
        Session::flash("success", "Data berhasil ditambahkan!");
        return redirect("/kategori");
    }
    public function destroy($id)
    {
        Kategori::destroy($id);
        Session::flash("deleted", "Data berhasil dihapus!");
        return redirect("/kategori");
    }
    public function update($id)
    {
        $data = request()->except(["_token", "_method"]);
        Kategori::where("id", $id)->update($data);
        Session::flash("updated", "Data berhasil diupdate!");
        return redirect("/kategori");
    }
    public function edit($id)
    {
        $dataKategori = Kategori::find($id);
        return view("kategori.edit", [
            "route" => "edit",
            "dataKategori" => $dataKategori,
            "title" => "Ubah Data Kategori - NiceAdmin",
        ]);
    }
}