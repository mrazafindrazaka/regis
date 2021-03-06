<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        return view('home', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return string
     */
    public function test(Request $request)
    {
        return view('test');
    }
}
