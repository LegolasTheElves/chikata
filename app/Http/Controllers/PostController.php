<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //accessing dashboard
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }
    //creating new post
    public function postCreatePost(Request $request)
    {
        //validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'Thre was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        
        return redirect()->route('dashboard')->with(['message' => $message]) ;
    }
    //deleting posts
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back;
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }
} 