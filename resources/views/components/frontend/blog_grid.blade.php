<div class="col-xl-4 col-lg-6 col-md-6 col-sm-9">
    <div class="blog-item mb-30">
        <div class="blog-thumb">
            <a href="{{route('blog.single.post',['id'=>$blog->id,'title'=>Str::slug($blog->blog_title)])}}"><img src="{{ asset('uploads/blog_photo') }}/{{$blog->blog_photo}}" alt=""></a>
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
