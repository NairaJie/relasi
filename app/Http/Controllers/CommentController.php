<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function createComment(Request $request, post $post){
        $data =$request->all();
        $comment = new Comment;
        $comment->post_id = $post->id;
        $comment->title =$data['title'];
        $comment->description = $data['description'];
        $comment->save();
        $status = "succes create comment";
        return response()->json(compact('post', 'satuts'),200);

    }

    public function updateComment(Request $request, Post $post, Comment $comment){
        $data= $request->all();
        if(isset($data['body']) && empty($data['body'])){
            $comment->body = $data['body'];
        }
        $comment->save();
        $status = "succes uptade comment";
        return response()->json(compact('post', 'status'), 200);
    }
    public function deleteComment(Post $post, Comment $comment){
        $comment->delete();
        $status ="succes update delete";
        return response()->json(compact('status'),200);
    }
}
