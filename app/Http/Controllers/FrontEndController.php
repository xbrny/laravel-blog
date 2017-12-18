<?php

namespace App\Http\Controllers;

use Newsletter;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {	
    	return view('index')->with('title', Setting::first()->site_name)
    					->with('categories', Category::limit(5)->get())
    					->with('latest_post', Post::latest()->first())
    					->with('second_third_posts', Post::latest()->offset(1)->limit(2)->get())
    					->with('front_end', Category::where('name', 'LIKE', '%front%')->first())
    					->with('back_end', Category::where('name', 'LIKE', '%back%')->first())
    					->with('site', Setting::first());
    }

    public function showPost($slug)
    {
    	$post = Post::where('slug', $slug)->first();

    	$next = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
    	$prev = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

    	return view('show_post')->with('site', Setting::first())
                            ->with('title', $post->title)
    						->with('post', $post)
    						->with('next', $next)
                            ->with('prev', $prev)
    						->with('tags', Tag::all())
							->with('categories', Category::limit(5)->get());
    }

    public function showCategory(Category $category)
    {
        return view('show_category')->with('category', $category)
                            ->with('title', $category->name)
                            ->with('site', Setting::first())
                            ->with('categories', Category::limit(5)->get());
    }

    public function showTag(Tag $tag)
    {
        return view('show_tag')->with('tag', $tag)
                            ->with('title', $tag->name)
                            ->with('site', Setting::first())
                            ->with('categories', Category::limit(5)->get());
    }

    public function search()
    {   
        $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();

        return view('results')->with('query', request('query'))
                            ->with('posts', $posts)
                            ->with('title', 'Search result: ' . request('query'))
                            ->with('site', Setting::first())
                            ->with('categories', Category::limit(5)->get());
    }

    public function subscribe()
    {
        $email = request('email');

        Newsletter::subscribe($email);

        session()->flash('subscribed', 'Successfully subscribed to Newsletter');
        
        return back();
    }
}
