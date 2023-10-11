<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function view(Request $request){
        $post = Post::find(1);
     
        if ($request->user()->can('view', $post)) {
            abort(403);
        } 
        
        return $post;
    }
    public function delete(Request $request){
        $post = Post::find(1);
     
        if ($request->user()->cannot('delete', $post)) {
            abort(403);
        } 
        
        return $post;
    }


    public function getUsers(){
        try{
            $users = User::get();
            $this->seccessResponse("users list successfully fetched", 200, $users);

        }catch(Exprection $e){
            $this->errorResponse($e->geetMessage(), $e->getStatusCode());
        }
    }
}
