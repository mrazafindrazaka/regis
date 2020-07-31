<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        return view('admin', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function create(Request $request)
    {
        return view('create_user', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Request
     */
    public function create_user(Request $request)
    {
        $save = new User;
        $stock = json_decode($request->getContent(), true);
        $save->name = $stock["name"];
        $save->email = $stock["email"];
        $save->password = Hash::make($stock["password"]);
        $save->is_admin = $stock["is_admin"];
        $save->save();
        return $request;
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param $id
     * @return Request
     */
    public function delete_user(Request $request, $id)
    {
        $save = User::find($id);

        $save->delete();
        return $request;
    }

    /**
     * Show the application dashboard.
     * @return User[]
     */
    public function get_all()
    {
        return User::orderBy('created_at','desc')->get();
    }
}
