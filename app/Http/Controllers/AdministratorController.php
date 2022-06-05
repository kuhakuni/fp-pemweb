<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = "administrator";
        return view("administrator.administrator", ["route" => $route]);
    }
    public function store()
    {
        $validatedData = request()->validate([
            "nama" => "required",
            "username" => "required",
            "password" => "required | min:8",
        ]);
        //hash password
        $validatedData["password"] = Hash::make($validatedData["password"]);
        Administrator::create($validatedData);
        Session::flash("success", "Akun berhasil dibuat!");
        return redirect("/login");
    }
    public function authenticate()
    {
        $remember = request()->has("remember") ? true : false;
        $validatedData = request()->validate([
            "username" => "required",
            "password" => "required| min:8",
        ]);
        if (Auth::attempt($validatedData, $remember)) {
            request()
                ->session()
                ->regenerate();
            return redirect()->intended();
        }
        Session::flash("error", "Username atau password salah!");
        return redirect("/login");
    }
    public function logout()
    {
        Auth::logout();

        request()
            ->session()
            ->invalidate();

        request()
            ->session()
            ->regenerateToken();
        return redirect("/login");
    }
}