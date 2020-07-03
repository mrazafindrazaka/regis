<?php

namespace App\Http\Controllers;

use App\Infos;
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
     * @return Renderable
     */
    public function create(Request $request)
    {
        return view('create', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @param Request $request
     * @return Renderable
     */
    public function detail_info($id, Request $request)
    {
        return view('detail', [
            'id' => $id,
            'user' => $request->user()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Request
     */
    public function create_recu(Request $request)
    {
        $save = new Infos;
        $save->info = json_encode(json_decode($request->getContent(), true));
        $save->active = true;
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
    public function update_recu(Request $request, $id)
    {
        $save = Infos::find($id);
        $save->info = json_encode(json_decode($request->getContent(), true));
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
    public function delete_recu(Request $request, $id)
    {
        $save = Infos::find($id);
        $save->active = false;
        $save->save();
        return $request;
    }



    /**
     * Show the application dashboard.
     * @return Infos[]
     */
    public function get_all()
    {
        return Infos::all();
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @return Infos
     */
    public function get_info($id)
    {
        return Infos::find($id);
    }
}
