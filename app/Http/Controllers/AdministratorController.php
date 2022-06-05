<?php

namespace App\Http\Controllers;

use App\Models\Administrator;

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
        return view("administrator", ["route" => $route]);
    }
}