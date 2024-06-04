@extends('theme.app')
@section('title', 'My blogs')

@section('content')

@include('theme.partials.hero', ['title' => 'My blogs'])

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @session('blogDeleteStatus')
                <div class="alert alert-warning">{{ session('blogDeleteStatus') }}</div>
                @endsession
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">#</th>
                            <th scope="col">Title</th>
                            <th scope="col" width="17%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($blogs) > 0)
                        @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>
                                <a href="{{ route('blog.edit', ['blog' => $blog]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="javascript:$('form#btn-del-{{ $blog->id }}').submit();"
                                    class="btn btn-sm btn-danger">Delete</a>
                                <form action="{{ route('blog.destroy', ['blog' => $blog]) }}" method="POST"
                                    id="btn-del-{{ $blog->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $blogs->render('pagination::bootstrap-5') }}
            </div>

            @include('theme.partials.sidebar')

        </div>
</section>
<!--================ End Blog Post Area =================-->

@endsection