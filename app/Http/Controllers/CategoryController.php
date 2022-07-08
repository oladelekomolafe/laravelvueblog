<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function all_category(){
        $categories = Category::all();
        //$user = User::whereId(4)->get()->first();
        
        //return response()->json($user->posts()->get());
        return response()->json($categories, 200);
        //$response = Response::json($messages, 200);
    }

    public function create_category(Request $request){
        //return response()->json($request->all(), 200);
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|min:2|max:50',
        ]);

        //return response()->json($pass);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $category = Category::create([
            'cat_name' => $request->cat_name,
        ]);

        if($category){
            return response()->json(['success' => 'Category successfully Added'], 200);
        }

        return response()->json(['error' => 'Unable to Add New Category'], 422);
    }

    public function delete_category(Request $request){

        try{
            $result = Category::whereId($request->cat_id)->delete();
            return response()->json(['success' => 'Category successfully Deleted'], 200);

        }catch(Exception $e){
            return response()->json(['error' => 'Unable to Add Delete Category'], 422);
        }
        
    }

    public function edit_category(Request $request){

        try{
            $category = Category::whereId($request->cat_id)->get()->first();
            return response()->json($category, 200);

        }catch(Exception $e){
            return response()->json(['error' => 'Unable to edit or find Category'], 422);
        }
        
    }

    public function update_category(Request $request){

        try{
            $category = Category::find($request->cat_id);

            if($category){

                $category->cat_name = $request->cat_name;
                $category->save();
               /* Category::whereId($request->cat_id)->update([
                    'cat_name'   => $request->cat_name,
                ]); */
                
                return response()->json(['success' => 'Category successfully updated'], 200);

            }else{
                return response()->json(['error' => 'Unable to update category....Category not found'], 422);
            }

        }catch(Exception $e){
            return response()->json(['error' => 'Unable to edit or find Category'], 422);
        }
        
    }

    public function getPostByCatId(Request $request, $id){
        $posts = Post::with('user','category')->where('cat_id', $id)->orderBy('id', 'desc')->get();
       
        return response()->json($posts, 200);
    }
}
