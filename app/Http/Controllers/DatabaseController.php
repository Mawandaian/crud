<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class DatabaseController extends Controller
{
    public function loadPage(){
        //Selecting all data from database
        $post_data = Post::get_all_posts();  
        return view('home')->with('database_data', $post_data);
    }

    public function saveData(Request $request){
        //Insert posts into the posts table
        Post::store_new_post($request);
        
        //Load home page after that
        return $this->loadPage();
    }

    public function updateData(Request $request){
        //Updating the posts table
        Post::update_old_post($request);

        //Load home page after that
        return $this->loadPage();
    }

    public function deleteData(Request $request){
        //Deleting posts from Posts table
        Post::delete_post($request);

        //Load home page after that
        return $this->loadPage();
    }
}
