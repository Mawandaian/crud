<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    //Getting all the data from the database
    public static function get_all_posts(){
        return static::orderBy('id','desc')->get();
    }

    //Function to insert data into the database
    public static function store_new_post($request)
    {
        $post = new Post;

        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');

        $post->save();
    }

    //Function to update data in the database
    public static function update_old_post($request)
    {
        $post = static::find($request->input('id'));

        $post->post_title = $request->input('post_title');
        $post->post_body = $request->input('post_body');

        $post->save();
    }

    //Function to delete data from the database
    public static function delete_post($request)
    {
        static::destroy($request->input('id'));
    }
}
