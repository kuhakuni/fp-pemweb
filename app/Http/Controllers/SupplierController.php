<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function index()
    {
        $dataSupplier = Supplier::all();
        $route = "supplier";
        return view("supplier.supplier", [
            "route" => $route,
            "dataSupplier" => $dataSupplier,
            "title" => "Data Supplier - NiceAdmin",
        ]);
    }
    public function store()
    {
        $data = request()->all();
        Supplier::create($data);
        Session::flash("success", "Data berhasil ditambahkan!");
        return redirect("/supplier");
    }
    public function destroy($id)
    {
        Supplier::destroy($id);
        Session::flash("deleted", "Data berhasil dihapus!");
        return redirect("/supplier");
    }
    public function update($id)
    {
        $data = request()->except(["_token", "_method"]);
        Supplier::where("id", $id)->update($data);
        Session::flash("updated", "Data berhasil diupdate!");
        return redirect("/supplier");
    }
    public function edit($id)
    {
        $dataSupplier = Supplier::find($id);
        return view("supplier.edit", [
            "route" => "edit",
            "dataSupplier" => $dataSupplier,
            "title" => "Ubah Data Supplier - NiceAdmin",
        ]);
    }
}