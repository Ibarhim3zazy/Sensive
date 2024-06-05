@php
use App\Models\Blog;
$categories = App\Models\Category::get();
$recentBlogs = App\Models\Blog::latest()->take('3')->get();
@endphp
<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @session('status')
            <div class="alert alert-success">{{ session('status') }}</div>
            @endsession
            <form action="{{ route('subscriber.store') }}" method="post">
                <div class="form-group mt-30">
                    <div class="col-autos">
                        @csrf
                        <input type="email" name="email" class="form-control" id="inlineFormInputGroup"
                            placeholder="Enter email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="bbtns d-block mt-20 w-100" type="submit">Subcribe</button>
            </form>
        </div>

        @if (count($categories) > 0)
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('theme.category', $category->id) }}" class="d-flex justify-content-between">
                        <p>{{ $category->name }}</p>
                        <p>{{ count($category->blogs) }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (count($recentBlogs) > 0)
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            @foreach ($recentBlogs as $blog)
            <div class="popular-post-list">
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('storage/images/'. $blog->image) }}" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">{{ $blog->user->name }}</a></li>
                            <li><a href="#">{{ $blog->created_at->format('d M Y') }}</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="{{ route('blog.show', ['blog' => $blog]) }}">
                            <h6>{{ $blog->title }}</h6>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<!-- End Blog Post Siddebar -->