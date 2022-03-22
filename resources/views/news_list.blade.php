@extends('layouts.main')
@section('content') 
 <div class="ps-blog-grid pt-80 pb-80">
        <div class="ps-container">
          <div class="row">
             @if($news)
              @foreach($news as $n)
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.html"></a><img src="/images/news/{{ $n->img }}" alt=""></div>
                      <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">{{ $n->title }}</a>
                        <p class="ps-post__meta"><span><a class="mr-5" href="blog.html">{{ $n->author }}</a></span> -<span class="ml-5">{{ $n->updated_at }}</span></p>
                        <p>{{ $n->short_text }}</p><a class="ps-morelink" href="{{ route('newsid',['slug' => $n->slug]) }}">Ko'proq o'qish<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                @endforeach  
                @endif
          </div>
          <div class="mt-30">
            <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
@endsection