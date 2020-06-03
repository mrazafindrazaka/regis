<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Contracts\Support\Renderable;
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
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('home', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Request
     */
    public function test(Request $request)
    {
        $save = new Test;
        $save->info = json_encode(json_decode($request->getContent(), true));
        $save->save();
        return $request;
    }

    /**
     * Show the application dashboard.
     */
    public function get_test()
    {
        return Test::all();
    }
}
