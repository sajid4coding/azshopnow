<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 m-w-50">
    <div class="blog-item mb-30">
        <div class="blog-thumb">
            @if ($blog->blog_photo != NULL)
                <a href="{{route('blog.single.post',['id'=>$blog->id,'title'=>Str::slug($blog->blog_title)])}}"><img src="{{ asset('uploads/blog_photo') }}/{{$blog->blog_photo}}" alt=""></a>
            @else
                <a href="{{route('blog.single.post',['id'=>$blog->id,'title'=>Str::slug($blog->blog_title)])}}"><img src="{{ asset('uploads/blog_photo') }}/default.png" alt=""></a>
            @endif
        </div>
        <div class="blog-content">
            <div class="comment">
                <a href="#">
                    <i class="fa-regular fa-comment"></i>
                    <span>18</span>
                </a>
            </div>
            <a href="{{route('post.blog')}}" class="tag">{{$blog->category}}</a>
            <h4 class="title"><a href="{{route('blog.single.post',['id'=>$blog->id,'title'=>Str::slug($blog->blog_title)])}}">{{Str::limit($blog->blog_title,30)}}</a></h4>
            {{-- <p>
                {!!$blog->description!!}
            </p> --}}
            <div class="blog-meta">
                <ul>
                    <li><a href="{{route('blog.single.post',['id'=>$blog->id,'title'=>Str::slug($blog->blog_title)])}}">read more</a></li>
                    <li> {{$blog->created_at->format('M d Y')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
