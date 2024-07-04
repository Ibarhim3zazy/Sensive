@extends('theme.app')
@section('title', 'Sensive')
@section('index-active', 'active')

@section('content')

<main class="site-main">

    <!--================Hero Banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>Tours & Travels</h3>
                    <h1>Amazing Places on earth</h1>
                    <h4>December 12, 2018</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner end =================-->

    <!--================ Blog slider start =================-->
    <section>
        <div class="container">
            @if (count($sliderBlogs) > 0)
            <div class="owl-carousel owl-theme blog-slider">
                @foreach ($sliderBlogs as $blog)
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img vh-10">
                        <img class="card-img rounded-0" height="150"
                            src="{{ file_exists('storage/images/'.$blog->image) ? asset('storage/images/'.$blog->image) : asset($blog->image) }}"
                            alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="{{ route('theme.category', $blog->category->id) }}">{{
                            $blog->category->name }}</a>
                        <h3><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!--================ Blog slider end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (count($blogs) > 0)
                    @foreach ($blogs as $blog)
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid w-100" height="250" src="{{ asset('storage/images/'.$blog->image) }}"
                                alt="">
                            <ul class="thumb-info">
                                <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                <li><a href="#"><i class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                </li>
                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="{{ route('blog.show', ['blog' => $blog]) }}">
                                <h3>{{ $blog->title }}</h3>
                            </a>
                            <p>{{ $blog->description }}</p>
                            <a class="button" href="{{ route('blog.show', ['blog' => $blog]) }}">Read More <i
                                    class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                    @endif



                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->render('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                @include('theme.partials.sidebar')
            </div>
    </section>
    <!--================ End Blog Post Area =================-->
</main>

@endsection