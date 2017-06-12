<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function get() {
		$posts = Post::get();
		return response()->success(['posts' => $posts]);
	}
}
