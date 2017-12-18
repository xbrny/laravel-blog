<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0)
        {
            session()->flash('info', 'Please create category and tags first in order to create post');

            return back();
        }


        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatePost($request);

        $featured_path = $this->moveFileAndGetPath($request);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => str_slug($request->title),
            'featured' => $featured_path,
            'category_id' => $request->category_id
        ]);

        $post->tags()->attach($request->tags);

        session()->flash('success', 'Successfully create a new post');

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('admin.posts.edit', compact('tags', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validatePost($request);

        $featured_path = $this->moveFileAndGetPath($request);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = str_slug($request->title);
        $post->featured = $featured_path;
        $post->category()->associate($request->category_id);
        $post->tags()->sync($request->tags);
        $post->save();

        session()->flash('success', 'Successfully update post');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success', 'Successfully delete post');

        return redirect()->route('posts');
    }

    public function trashed()
    {
        return view('admin.posts.trashed')->with('posts', Post::onlyTrashed()->get());
    }

    public function restore($id)
    {   
        $post = Post::onlyTrashed()->where('id', $id)->restore();

        session()->flash('success', 'Successfully restore post');

        return redirect()->route('posts');
    }

    public function kill($id)
    {

        Post::onlyTrashed()->where('id', $id)->forceDelete();

        session()->flash('success', 'Successfully delete post permanently');

        return back();
    }

    public function validatePost($request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|max:1000',
            'category_id' => 'required',
            // 'featured' => 'required|mimes:jpeg,bmp,png',
            // 'featured' => 'required|images',
            // 'tags' => 'required'
        ]);
    }

    public function moveFileAndGetPath($request)
    {   
        $base_path = 'uploads/posts';

        if(!$request->hasFile('featured'))
        {
            return $base_path . '/default.png';
        }
        $featured_new_name = time() . $request->featured->getClientOriginalName();

        return $featured_path = $request->featured->move($base_path, $featured_new_name);
    }
}
