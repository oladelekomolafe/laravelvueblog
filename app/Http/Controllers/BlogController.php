<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function all_blog_post(){

        $posts = Post::with('user','category')->orderBy('id','DESC')->get();
       
        return response()->json($posts, 200);
    }

    public function singlepost(Request $request, $id){
        
        $singlepost = Post::with('user','category')->whereId($id)->first();
       
        return response()->json($singlepost, 200);
    }

    public function search_post(Request $request){
        $search = $request->s;
        $posts = Post::with('user', 'category')
            ->where('title', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();

        return response()->json($posts, 200);
    }
}
