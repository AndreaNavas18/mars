<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tendero;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tenderos = DB::table('tenderos')->get();

        return view('home', compact('tenderos'));
    }
}
