<?php

namespace App\Http\Controllers;

use App\Quittances;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class QuittanceController extends Controller
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
        return view('quittance', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function create(Request $request)
    {
        return view('create_quittance', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @param Request $request
     * @return Renderable
     */
    public function detail_info($id, Request $request)
    {
        return view('detail_quittance', [
            'id' => $id,
            'user' => $request->user()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Quittances
     */
    public function create_recu(Request $request)
    {
        $save = new Quittances;
        $save->info = json_encode(json_decode($request->getContent(), true));
        $save->active = true;
        $save->save();
        return $save;
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
        $save = Quittances::find($id);
        $save->info = json_encode(json_decode($request->getContent(), true));
        $save->save();
        return $save;
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
        $save = Quittances::find($id);
        $save->active = false;
        $save->save();
        return $request;
    }

    /**
     * Show the application dashboard.
     * @return Quittances[]
     */
    public function get_all()
    {
        return Quittances::orderBy('created_at','desc')->get();
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @return Quittances
     */
    public function get_info($id)
    {
        return Quittances::find($id);
    }
}
