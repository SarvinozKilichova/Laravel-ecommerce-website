@extends('layouts.main')
@section('content') 

  <div class="row">    
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      

      <div class="carousel-inner">
          <div class="item active">
            <img src="/images/banner1.png" alt="Second slide" >
              <div class="header-text text-center">
              </div>
          </div>
          <div class="item">
            <img src="/images/banner2.jpg" alt="Second slide">
              <div class="header-text text-center">
              </div>
            </div>
           <div class="item">
              <img src="/images/banner4.jpg">
            </div>
        </div>
      </div><!-- /carousel -->
    </div>
</div>
 <div class="ps-section--offer" style="margin-top: 10px;">
    <div class="ps-column" style="margin-bottom: 5px"><a class="ps-offer" href="product-listing.html"><img src="/images/banner/5.jpg" alt=""></a></div>
    <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="/images/banner/first.jpg" alt=""></a></div>
  </div>

    <div class="container mt-20">
      <h3 class="ps-section__title pl-2" data-mask="kategoriya">Asosiy Kategoriyalar</h3>
      <div class="row mb-2 pl-1 pr-1"> 
        <div class=" col-md-6 col-sm-12 col-xs-12 menu-col">  
          <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 mb-20 menu-image">
            <a href="{{ route('category',['category' => 'mobiles', 'catId' => base64_encode("1")]) }}"><img src="images/phones.jpg" class="w3-card-4 w3-round w3-hover-opacity">
               <h4 class="menu-text">Telefon va Aksassuarlar</h4>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 mb-20 menu-image ">
             <a href="{{ route('category',['category' => 'computers', 'catId' => base64_encode("2")]) }}"><img src="images/computers.png" class="w3-card-4 w3-round w3-hover-opacity">
               <h4 class="menu-text">Kompyuter va Orgtexnika</h4>
             </a>
          </div>  
        </div>  
      <div class="col-md-6 col-sm-12 col-xs-12 menu-col">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 mb-20 menu-image">
            <a href="{{ route('category',['category' => 'bitovaya', 'catId' => base64_encode("4")]) }}"><img src="images/household.jpg" class="w3-card-4 w3-round w3-hover-opacity">
               <h4 class="menu-text">Maishiy Texnika</h4>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6  col-xs-6 mb-20 menu-image">
             <a href="{{ route('category',['category' => 'electronics', 'catId' => base64_encode("3")]) }}"><img src="images/tv1.jpg" class="w3-card-4 w3-round w3-hover-opacity">
               <h4 class="menu-text">Elektron texnikalar</h4>
             </a>
          </div>
        </div>  
        </div>
      </div>

      <div class="ps-section--features-product ps-section masonry-root pt-50 pb-100">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="new">- Yangi mahsulotlar </h3>
            <ul class="ps-masonry__filter">
              <li class="current"><a href="#" data-filter="*">Barchasi<sup></sup></a></li>
              <li><a href="#" data-filter=".phones">Telefon va Aksassuarlar<sup></sup></a></li>
              <li><a href="#" data-filter=".computers">Kompyuter va Orgtexnika<sup></sup></a></li>
              <li><a href="#" data-filter=".appliances">Maishiy Texnika<sup></sup></a></li>
              <li><a href="#" data-filter=".electronics">Elektron texnikalar <sup></sup></a></li>
            </ul>
          </div>
          <div class="ps-section__content pb-50 m-5">
            <div class="masonry-wrapper" data-col-md="6" data-col-sm="4" data-col-xs="2" data-gap="30" data-radio="100%">
              <div class="ps-masonry">                 
              @if(isset($phones))              
                @foreach($phones as $p)             
                  <div class="grid-item phones p-5 mt-10">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug,  'id' =>base64_encode($p->id) , 'name' => $p->name.$p->modelName]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $p->img }}" alt="{{ $p->name }}">
                          @if ( $p->new > 0 )
                           <span class="label label-success">yangi</span>
                          @endif
                          @if ( $p->discount > 0 )
                            <span class="label label-danger">-{{ $p->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug,  'id' =>base64_encode($p->id) , 'name' => $p->name.$p->modelName]) }}" class="title">{{ $p->name }}
                        <p>{{ $p->modelName }}</p>  
                        </a>
                          <div class="price-wrap">
                            @if ( $p->newPrice > 0 )
                            <span class="small  text-danger" style="text-decoration: line-through">{{ $p->newPrice }} сум</span>
                            @endif  
                            <br>
                            <span class="price font-weight-bold">{{ $p->price }} сум</span>
                            </div> <!-- price.// -->
                        </div>
                    </div>
                  </div>         
                @endforeach             
              @endif

              @if(isset($computers))
                @foreach($computers as $c)               
                   <div class="grid-item computers mt-10">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $c->cat_slug, 'subcat' => $c->slug, 'id' =>base64_encode($c->id),  'name' => $c->name.$c->modelName]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $c->img }}" alt="{{ $c->name }}">
                          @if ( $c->new > 0 )
                           <span class="label label-success">yangi</span>
                          @endif
                          @if ( $c->discount > 0 )
                            <span class="label label-danger">-{{ $c->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="{{ route('productId',['category' => $c->cat_slug, 'subcat' => $c->slug, 'id' =>base64_encode($c->id),  'name' => $c->name.$c->modelName]) }}" class="title">{{ $c->name }}
                        <p>{{ $c->modelName }}</p>  
                        </a>
                          <div class="price-wrap">
                            @if ( $c->newPrice > 0 )
                            <span class="small  text-danger" style="text-decoration: line-through">{{ $c->newPrice }} сум</span>
                            @endif  
                            <br>
                            <span class="price font-weight-bold">{{ $c->price }} сум</span>
                            </div> <!-- price.// -->
                        </div>
                    </div>
                  </div>          
                @endforeach
              @endif
              @if(isset($electronics))
                @foreach($electronics as $e)               
                  <div class="grid-item electronics">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $e->cat_slug, 'subcat' => $e->slug, 'id' =>base64_encode($e->id), 'name' => $e->name.$e->modelName]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $e->img }}" alt="{{ $e->name }}">
                          @if ( $e->new > 0 )
                           <span class="label label-success">yangi</span>
                          @endif
                          @if ( $e->discount > 0 )
                            <span class="label label-danger">-{{ $e->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="{{ route('productId',['category' => $e->cat_slug, 'subcat' => $e->slug, 'id' =>base64_encode($e->id), 'name' => $e->name.$e->modelName]) }}" class="title">{{ $e->name }}
                         <p>{{ $e->modelName }}</p> 
                        </a>
                          <div class="price-wrap">
                            @if ( $e->newPrice > 0 )
                            <span class="small  text-danger" style="text-decoration: line-through">{{ $e->newPrice }} сум</span>
                            @endif  
                            <br>
                            <span class="price font-weight-bold">{{ $e->price }} сум</span>  
                            </div> <!-- price.// -->
                        </div>
                    </div>
                  </div>          
                @endforeach
              @endif
              @if(isset($appliances))
                @foreach($appliances as $a)               
                  <div class="grid-item appliances p-5">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $a->cat_slug, 'subcat' => $a->slug, 'id' =>base64_encode($a->id) , 'name' => $a->name.$a->modelName]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $a->img }}" alt="{{ $a->name }}">
                          @if ( $a->new > 0 )
                           <span class="label label-success">yangi</span>
                          @endif
                          @if ( $a->discount > 0 )
                            <span class="label label-danger">-{{ $a->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="{{ route('productId',['category' => $a->cat_slug, 'subcat' => $a->slug, 'id' =>base64_encode($a->id) , 'name' => $a->name.$a->modelName]) }}" class="title">{{ $a->name }}
                          <p>{{ $a->modelName }}</p>
                        </a>
                          <div class="price-wrap">
                          @if ( $a->newPrice > 0 )
                            <span class="small  text-danger" style="text-decoration: line-through">{{ $a->newPrice }} сум</span>
                          @endif  
                            <br>
                            <span class="price">{{ $a->price }} сум</span>
                            </div> <!-- price.// -->
                        </div>
                    </div>
                  </div>          
                @endforeach
              @endif
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="ps-features pt-80 pb-80 bg--cover" data-background="/images/banner/12.jpg">
    <div class="ps-container">
      <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
              <div class="ps-iconbox ps-iconbox--inverse">
                <div class="ps-iconbox__header"><i class="ps-icon-delivery"></i>
                  <h3>BEPUL YETKAZIB BERISH</h3>
                  <p>$199 DAN OSHGAN BUYURTMALAR UCHUN </p>
                </div>
                <div class="ps-iconbox__content">
                  <p>Paketni kuzatishni xohlaysizmi? Buyurtmalaringizdan kuzatuv ma'lumotlarini va buyurtma ma'lumotlarini toping.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
              <div class="ps-iconbox ps-iconbox--inverse">
                <div class="ps-iconbox__header"><i class="ps-icon-money"></i>
                  <h3>100% PULNI QAYTARIB BERISH.</h3>
                  <p>YETKAZIB BERILGANDAN 3 KUN DAVOMIDA
                </div>
                <div class="ps-iconbox__content">
                  <p>To'liq qaytarib berish uchun etkazib berilgandan keyin 30 kun ichida sotilgan eng yangi, ochilmagan narsalarni qaytarib berishingiz mumkin.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
              <div class="ps-iconbox ps-iconbox--inverse">
                <div class="ps-iconbox__header"><i class="ps-icon-customer-service"></i>
                  <h3> 24/7 QO'LLAB QUVVATLASH</h3>
                  <p>BIZ SIZGA ONLINE YORDAN KO'RSATAMIZ</p>
                </div>
                <div class="ps-iconbox__content">
                  <p>Biz 24/7 mijozlar uchun ishonch telefonini taklif qilamiz, agar sizda savol bo'lsa, siz hech qachon yolg'iz qolmaysiz.</p>
                </div>
              </div>
            </div>
           </div> 
      </div>
    </div>
     
     <!-- <div class="ps-section--sale-off ps-section pt-80 pb-40">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="Sale off">- Hot Deal Today</h3>
          </div>
          <div class="ps-section__content">
            <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="ps-hot-deal">
                      <h3>Nike DUNK Max 95 OG</h3>
                      <p class="ps-hot-deal__price">Only:  <span>£155</span></p>
                      <ul class="ps-countdown" data-time="December 13, 2017 15:37:25">
                        <li><span class="hours"></span><p>Hours</p></li>
                        <li class="divider">:</li>
                        <li><span class="minutes"></span><p>minutes</p></li>
                        <li class="divider">:</li>
                        <li><span class="seconds"></span><p>Seconds</p></li>
                      </ul><a class="ps-btn" href="#">Order Today<i class="ps-icon-next"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="ps-hotspot"><a class="point first active" href="javascript:;"><i class="fa fa-plus"></i>
                        <div class="ps-hotspot__content">
                          <p class="heading">JUMP TO HEADER</p>
                          <p>Dynamic Fit Collar en la zona del tobillo que une la parte inferior de la pierna y el pie sin reducir la libertad de movimiento.</p>
                        </div></a><a class="point second" href="javascript:;"><i class="fa fa-plus"></i>
                        <div class="ps-hotspot__content">
                          <p class="heading">JUMP TO HEADER</p>
                          <p>Dynamic Fit Collar en la zona del tobillo que une la parte inferior de la pierna y el pie sin reducir la libertad de movimiento.</p>
                        </div></a><a class="point third" href="javascript:;"><i class="fa fa-plus"></i>
                        <div class="ps-hotspot__content">
                          <p class="heading">JUMP TO HEADER</p>
                          <p>Dynamic Fit Collar en la zona del tobillo que une la parte inferior de la pierna y el pie sin reducir la libertad de movimiento.</p>
                        </div></a><img src="images/hot-deal.png" alt=""></div>
                  </div>
            </div>
          </div>
        </div>
      </div>-->
      <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-6 ">
                    <h3 class="ps-section__title" data-mask="BEST SALE">- Chegirmalar</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i></a><a class="ps-next" href="#"><i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="1000" data-owl-gap="20" data-owl-nav="false" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="4" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" >              
                @if(isset($discount))
                @foreach($discount as $p)
                <div class="ps-shoes--carousel" >               
                <div class="grid-item phones p-5 mt-10">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug, 'id' =>base64_encode($p->id), 'name' => $p->name.$p->modelName]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $p->img }}" alt="{{ $p->name }}">
                          @if ( $p->new > 0 )
                           <span class="label label-success">yangi</span>
                          @endif
                          @if ( $p->discount > 0 )
                            <span class="label label-danger">-{{ $p->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug, 'id' =>base64_encode($p->id), 'name' => $p->name.$p->modelName]) }}" class="title">{{ $p->name }}
                          <p>{{ $p->modelName }}</p>
                        </a>
                          <div class="price-wrap">
                            <span class="small  text-danger" style="text-decoration: line-through">{{ $p->newPrice }} сум</span>
                            <br>
                            <span class="price font-weight-bold">{{ $p->price }} сум</span>
                            </div> <!-- price.// -->
                        </div>
                    </div>
                  </div>
                </div>                   
                @endforeach
              @endif              
            </div>
          </div>
        </div>
      </div>
      <div class="ps-home-testimonial bg--parallax pb-80" data-background="/images/banner/second.jpg">
        <div class="container">
          <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
            @if(@feedback)
            @foreach($feedback as $f)
            <div class="ps-testimonial">
              <div class="ps-testimonial__thumbnail"><img src="/images/user/userimg.png" alt=""><i class="fa fa-quote-left"></i></div>
              <header>
                <p>{{ $f->fname }} {{ $f->lname }}</p>
              </header>
              <footer>
                <p>“{{ $f->text }} “</p>
              </footer>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="ps-section ps-home-blog pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="News">- Yangiliklar</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="{{ route('news') }}">Barchasini ko'rish<i class="fa fa-long-arrow-right"></i></a></div>
          </div>
          <div class="ps-section__content">
            <div class="row">
              @if($news)
              @foreach($news as $n)
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ route('newsid',['slug' => $n->slug]) }}"></a><img src="/images/news/{{ $n->img }}" alt=""></div>
                      <div class="ps-post__content"><a class="ps-post__title" href="{{ route('newsid',['slug' => $n->slug]) }}">{{ $n->title }}</a>
                        <p class="ps-post__meta"><span><a class="mr-5" href="#">{{ $n->author }}</a></span> -<span class="ml-5"> <?php echo date_format($n->created_at, 'Y-m-d') ?></span></p>
                        <p>{{ $n->short_text }}</p><a class="ps-morelink" href="{{ route('newsid',['slug' => $n->slug]) }}">Ko'proq o'qish<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                @endforeach  
                @endif
            </div>
          </div>
        </div>
      </div>

@endsection

