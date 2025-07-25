<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
  /** Display a listing of the resource. **/
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('posts.index', compact('posts'));
  }

  /**  Show the form for creating a new resource. **/
  public function create()
  {
    return view('posts.create');
  }

  /** Store a newly created resource in storage. **/
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'content' => 'required',
      'cover_image' => 'nullable|image|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('cover_image')) {
      $imagePath = $request->file('cover_image')->store('covers', 'public');
    }

    Post::create([
      'title' => $request->title,
      'content' => $request->content,
      'author' => Auth::user()->name,
      'cover_image' => $imagePath,
    ]);

    return redirect()->route('posts.index')->with('success', "Post Created!");
  }

  /** Display the specified resource. **/
  public function show(Post $post)
  {
    return view('posts.show', compact('post'));
  }

  /** Show the form for editing the specified resource. **/
  public function edit(Post $post)
  {
    return view('posts.edit', compact('post'));
  }

  /** Update the specified resource in storage. **/
  public function update(Request $request, Post $post)
  {
    $request->validate([
      'title' => 'required',
      'content' => 'required',
      'cover_image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('cover_image')) {
      $imagePath = $request->file('cover_image')->store('covers', 'public');
      $post->cover_image = $imagePath;
    }

    $post->update([
      'title' => $request->title,
      'content' => $request->content,
      'author' => Auth::user()->name,
    ]);

    return redirect()->route('posts.index')->with('success', "Post Updated!");
  }

  /** Remove the specified resource from storage. **/
  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('posts.index')->with('success', "Post deleted!");
  }
}
