<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.home');
    }

    public function indexContracts()
    {
        return view('auth.contracts');
    }

    public function saveContract(Request $request)
    {
        dd($request);
    }
}
