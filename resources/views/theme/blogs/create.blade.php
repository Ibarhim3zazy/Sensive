@extends('theme.app')
@section('title', 'register')

@section('content')

@include('theme.partials.hero', ['title' => 'Add New Blog'])

<!-- ================ Register section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @session('blogCreateStatus')
                <div class="alert alert-success">{{ session('blogCreateStatus') }}</div>
                @endsession
                <form action="{{ route('blog.store') }}" class="form-contact contact_form" method="post"
                    id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control border" name="title" type="text"
                                    placeholder="Enter your blog title" value="{{ old('title') }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div class=" form-group">
                                <input class="form-control border" name="image" type="file">
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <select class="form-control border" name="category_id"
                                    placeholder="Enter your password">
                                    @if (count($categories) > 0)
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <textarea class="w-100 p-2 border" name="description"
                                    placeholder="Enter your description" rows="5">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ Register section end ================= -->

@endsection