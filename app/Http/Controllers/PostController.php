<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//use Response;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function all_post(){
        //$posts = Post::all();
        //$user = User::whereId(4)->get()->first();
        $posts = Post::with('user','category')->orderBy('id','DESC')->get();

        
        //return response()->json($user->posts()->get());
        return response()->json($posts, 200);
        //$response = Response::json($messages, 200);
    }

    public function create_post(Request $request){
        if (Auth::check()) {

            $validator = Validator::make($request->all(), [
                'title' => 'required|min:2|max:50',
                'description' => 'required|min:2|max:1000',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), 422);
            }

            // The user is logged in...
           /* $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode( '/', $sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $img->save($upload_path.$name);*/

            //return response()->json($user->id);
            $newPost = new Post();
            $newPost->title = $request->title;
            $newPost->description = $request->description;
            $newPost->cat_id = $request->cat_id;
            $newPost->user_id = Auth::user()->id;
            $newPost->photo = $request->photo;
            $newPost->save();

            return response()->json($newPost, 200);

        }else{
            return response()->json(['error' => 'Unable to Add New Post'], 422);
        }
    }

    public function delete_post(Request $request){

        try{
            /*$post = Post::find($request->post_id);
            $post->delete();*/

            $result = Post::whereId($request->post_id)->delete(); //here we are deleting the file

           /* $image_path = public_path(). "/uploadimage/";
            $image = $image_path . $post->photo;
            if(file_exists($image)){
                @unlink($image);
            }*/
            return response()->json(['success' => 'Post successfully Deleted'], 200);

        }catch(Exception $e){
            return response()->json(['error' => 'Unable to Add Delete Post'], 422);
        }
        
    }

    public function edit_post(Request $request){

        try{
            $post = Post::whereId($request->post_id)->get()->first();
            return response()->json($post, 200);

        }catch(Exception $e){
            return response()->json(['error' => 'Unable to edit or find Category'], 422);
        }
        
    }

    public function update_post(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:1000',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        try{
            $post = Post::find($request->postid);

            if($post){

                $post->title = $request->title;
                $post->description = $request->description;
                $post->cat_id = $request->cat_id;
                $post->user_id = Auth::user()->id;
                $post->photo = $request->photo;
                $post->save();
               /* Category::whereId($request->cat_id)->update([
                    'cat_name'   => $request->cat_name,
                ]); */
                return response()->json(['success' => 'Post successfully updated'], 200);

            }else{
                return response()->json(['error' => 'Unable to update post....Post not found'], 422);
            }

        }catch(Exception $e){
            return response()->json(['error' => 'Unable to edit or find Post'], 422);
        }
        
    }
}
