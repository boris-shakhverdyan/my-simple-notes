<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        if ($req->input("search") !== null) {
            $req = DB::table("notes")->where("user_id", Auth::user()->id)->where("title", "LIKE", "%" . $req->input("search") . "%")->get();
        } else {
            $req = DB::table("notes")->where("user_id", Auth::user()->id)->where("is_removed", 0)->get();
        }

        $data = [
            "notes" => $req
        ];

        return view('home.index', $data);
    }

    public function create()
    {
        return view("home.create");
    }

    public function edit($id)
    {
        $res = DB::table("notes")->find($id);

        $data = [
            "note" => $res
        ];

        return view("home.edit", $data);
    }

    public function trash()
    {
        $res = DB::table("notes")->where("user_id", Auth::user()->id)->where("is_removed", "1")->get();

        $data = [
            "notes" => $res
        ];

        return view("home.trash", $data);
    }
}
