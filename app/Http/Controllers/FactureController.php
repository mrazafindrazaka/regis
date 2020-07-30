<?php

namespace App\Http\Controllers;

use App\Factures;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class FactureController extends Controller
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
        return view('facture', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function create(Request $request)
    {
        return view('create_facture', ['user' => $request->user()]);
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @param Request $request
     * @return Renderable
     */
    public function detail_info($id, Request $request)
    {
        return view('detail_facture', [
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
    public function create_facture(Request $request)
    {
        $save = new Factures;
        $stock = json_decode($request->getContent(), true);
        $save->info = json_encode($stock["info"]);
        $save->number_facture = $stock["number_facture"];
        $save->description = $stock["description"];
        $save->regisseur = $stock["regisseur"];
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
    public function update_facture(Request $request, $id)
    {
        $save = Factures::find($id);
        $stock = json_decode($request->getContent(), true);
        $save->info = json_encode($stock["info"]);
        $save->number_facture = $stock["number_facture"];
        $save->description = $stock["description"];
        $save->regisseur = $stock["regisseur"];
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
    public function delete_facture(Request $request, $id)
    {
        $save = Factures::find($id);
        $save->active = false;
        $save->save();
        return $request;
    }

    /**
     * Show the application dashboard.
     * @return Factures[]
     */
    public function get_all()
    {
        return Factures::orderBy('created_at','desc')->get();
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @return Factures
     */
    public function get_info($id)
    {
        return Factures::find($id);
    }
}
