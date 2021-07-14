@extends('layouts.app')

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Blogs</h2>
            </div>

            <div class="row">
                <div class="row justify-content-end">
                    <a href="{{ route('add_blog') }}" class="btn btn-success col-md-2 m-3">Add New Blog</a>
                </div>
                <div class=" pt-4 pt-lg-0 content text-center">
                    <h3>Search by tag:
                        @foreach($tags as $tag)
                            <a href="{{route('blogs_according_to_tag', $tag->name)}}" class=" badge bg-{{$tag->color}} mb-1">{{$tag->name}}</a>
                        @endforeach
                    </h3>
                    <div class="row">
                        @forelse($blogs as $key => $blog)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="{{ $key>3? 100*($key/3) : 100*($key+1)}}">
                                <div class="icon-box iconbox-{{ $blog->icon_color }}">
                                    <div class="icon">
                                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="{{ $blog->svg_path_d }}"></path>
                                        </svg>
                                        <i class="bx {{ $blog->class }}"></i>
                                    </div>
                                    <h4><a href="{{ route('show_blog', $blog->id) }}">{{ $blog->title }}</a></h4>
                                    @foreach($blog->tags as $tag)
                                        <span class="badge bg-{{$tag->color}} mb-1">{{$tag->name}}</span>
                                    @endforeach
                                    <p>{{ $blog->excerpt }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No relevant blogs yet</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
@endsection
