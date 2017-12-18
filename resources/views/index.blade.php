@extends('layouts.front_end')

@section('content')

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $latest_post->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $latest_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{ route('front.posts.show', ['slug' => $latest_post->slug ]) }}">{{ $latest_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime={{ $latest_post->created_at }}>
                                                {{ $latest_post->created_at->diffForHumans() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('front.categories.show', ['id' => $latest_post->category->id]) }}">{{ $latest_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            
            @foreach($second_third_posts  as $post)
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                            <div class="post-thumb">
                                <img src="{{  $post->featured }}" alt="seo">
                                <div class="overlay"></div>
                                <a href="{{ $post->featured }}" class="link-image js-zoom-image">
                                    <i class="seoicon-zoom"></i>
                                </a>
                                <a href="#" class="link-post">
                                    <i class="seoicon-link-bold"></i>
                                </a>
                            </div>

                            <div class="post__content">

                                <div class="post__content-info">

                                        <h2 class="post__title entry-title ">
                                            <a href="{{ route('front.posts.show', ['slug' => $post->slug ]) }}">{{ $post->title }}</a>
                                        </h2>

                                        <div class="post-additional-info">

                                            <span class="post__date">

                                                <i class="seoicon-clock"></i>

                                                <time class="published" datetime="{{ $post->created_at }}">
                                                    {{ $post->created_at->diffForHumans() }}
                                                </time>

                                            </span>

                                            <span class="category">
                                                <i class="seoicon-tags"></i>
                                                <a href="{{ route('front.categories.show', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
                                            </span>

                                            <span class="post__comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                                6
                                            </span>

                                        </div>
                                </div>
                            </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $front_end->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($front_end->posts()->latest()->limit(3)->get() as $post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="{{ $post->featured }}" alt="our case">
                                        </div>
                                        <h6 class="case-item__title"><a href="{{ route('front.posts.show', ['slug' => $post->slug ]) }}">{{ $post->title }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $back_end->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($back_end->posts()->latest()->limit(3)->get() as $post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="{{ $post->featured }}" alt="our case">
                                        </div>
                                        <h6 class="case-item__title"><a href="{{ route('front.posts.show', ['slug' => $post->slug ]) }}">{{ $post->title }}</a></h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>

@endsection