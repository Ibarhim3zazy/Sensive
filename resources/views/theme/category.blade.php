@extends('theme.app')
@section('title', 'Categories')
@section('category-active', 'active')

@section('content')

@include('theme.partials.hero', ['title' => 'Categories'])

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @if (count($blogs) > 0)
                    @foreach ($blogs as $blog)
                    <div class="col-md-6">
                        <div class="single-recent-blog-post card-view">
                            <div class="thumb">
                                <img class="card-img rounded-0"
                                    src="{{ file_exists('storage/images/'.$blog->image) ? asset('storage/images/'.$blog->image) : asset($blog->image) }}"
                                    alt="">
                                <ul class="thumb-info">
                                    <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                    <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blog.show', ['blog' => $blog]) }}">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                <p>{{ Str::limit($blog->description, 100, '...') }}</p>
                                <a class="button" href="{{ route('blog.show', ['blog' => $blog]) }}">Read More <i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

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

@endsection