<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
  public function create(Request $request)
  {
      $this->validate($request, [
        'name'  => 'required|string',
        'content' => 'required|string',
        'url' => 'required|string',
        ]);
    
      $post = new Post;
      $post->name = $request->input('name');
      $post->url = $request->input('url');
      $post->content = $request->input('content');
      $post->save();
    
      return response()->success(compact('post'));
  }
  
}