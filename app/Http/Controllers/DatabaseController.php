<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function loadPage(){
        $data = DB::select("select * from posts");
        
        return view('home')->with('database_data', $data);
    }

    public function saveData(Request $request){
        DB::insert("insert into posts (post_title, post_body) values(?,?)",[$request->input('post_title'), $request->input('post_body')]);
        
        //Load home page after that
        return $this->loadPage();
    }

    public function updateData(Request $request){
        DB::update("update posts set post_title=?, post_body=? where post_id=?", [$request->input('post_title'), $request->input('post_body'), $request->input('id')]);
        
        //Load home page after that
        return $this->loadPage();
    }

    public function deleteData(Request $request){
        DB::delete("delete from posts where post_id=?",[$request->input('id')]);

        //Load home page after that
        return $this->loadPage();
    }
}
