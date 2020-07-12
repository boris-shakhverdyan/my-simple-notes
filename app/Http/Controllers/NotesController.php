<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function create(Request $req)
    {
        DB::table("notes")->insert([
            "user_id" => Auth::user()->id,
            "title" => $req->input("title"),
            "description" => $req->input("description"),
        ]);

        return redirect()->route("home");
    }

    public function edit($id, Request $req)
    {
        DB::table("notes")->where("id", $id)->update([
            "title" => $req->input("title"),
            "description" => $req->input("description"),
            "updated_at" => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route("edit", $id)->with("success", "Note updated successfully.");
    }

    public function delete($id)
    {
        DB::table("notes")->delete($id);

        return redirect()->route("trash");
    }

    public function trash($id)
    {
        DB::table("notes")->where("id", $id)->update([
            "is_removed" => 1
        ]);

        return redirect()->route("home");
    }

    public function restore($id)
    {
        DB::table("notes")->where("id", $id)->update([
            "is_removed" => 0
        ]);

        return redirect()->route("trash");
    }
}
