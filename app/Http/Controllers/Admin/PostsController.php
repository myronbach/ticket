<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PostEditFormRequest;
use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => str_slug($request->get('title'), '-'),
            'user_id' => auth()->id()
        ]);
        $post->save();
        //dd($post);

        $post->categories()->sync($request->get('categories'));

        return redirect('/admin/posts/create')->with('status', 'The post has been created!');
    }

    public function index()
    {
        $posts = Post::all();
        return view('backend.posts.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        //dump($categories);
        $selectedCategories = $post->categories->pluck('id')->toArray();
        return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }

    public function update(Post $post, PostEditFormRequest $request)
    {
        $data = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => str_slug($request->get('title'), '-'),
        ];

        $post->update($data);
        $post->categories()->sync($request->get('categories'));

        return redirect(action('Admin\PostsController@edit', $post->id))->with('status', 'The post has been updated');
    }
}
