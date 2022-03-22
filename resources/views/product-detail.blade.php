    @extends('layouts.main')
      @section('content')
    @if(isset($products))
    <input type="hidden" id="productId" value="{{ $products->productId }}"> 
    <input type="hidden" id="cat_slug" value="{{ $cat_slug }}">
    <input type="hidden" id="sub_slug" value="{{ $sub_slug }}">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                    <div class="item"><img src="/images/products/{{ $products->img }}" alt=""></div>
                    <div class="item"><img src="/images/products/{{ $products->img2 }}" alt=""></div>
                    <div class="item"><img src="/images/products/{{ $products->img3 }}" alt=""></div>
                    <div class="item"><img src="/images/products/{{ $products->img4 }}" alt=""></div>
                    <div class="item"><img src="/images/products/{{ $products->img1 }}" alt=""></div>
                  </div>
                   @if($products->video != '') 
                  <a class="popup-youtube ps-product__video" href="images/products/video{{ $products->video }}"><img src="images/shoe-detail/1.jpg" alt=""><i class="fa fa-play"></i></a>
                  @endif
                </div>

                <div class="ps-product__image">
                  <div class="item"><img class="zoom" src="/images/products/{{ $products->img1 }}" alt="" data-zoom-image="/images/products/{{ $products->img1 }}"></div>
                  <div class="item"><img class="zoom" src="/images/products/{{ $products->img2 }}" alt="" data-zoom-image="/images/products/{{ $products->img2 }}"></div>
                  <div class="item"><img class="zoom" src="/images/products/{{ $products->img3 }}" alt="" data-zoom-image="/images/products/{{ $products->img3 }}"></div>
                  <div class="item"><img class="zoom" src="/images/products/{{ $products->img4 }}" alt="" data-zoom-image="/images/products/{{ $products->img4 }}"></div>
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img id="img" src="/images/products/{{ $products->img }}" alt=""></div>
                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="/images/products/{{ $products->img1 }}" alt=""><img src="/images/products/{{ $products->img2 }}" alt=""><img src="/images/products/{{ $products->img3 }}" alt="{{ $products->name }}"><img src="/images/products/{{ $products->img4 }}" alt="{{ $products->name }}"></div>
              </div>
              <div class="ps-product__info">
                <div class="ps-product__rating">
                  <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select><a href="#">(Read all 8 reviews)</a>
                </div>
                <h2 id="name">{{ $products->name }}</h2>
                <p class="ps-product__category">{{ $products->modelName  }}</p>
                @if ( $products->discount > 0 )
                <h3 class="ps-product__price changePrice">{{ $products->newPrice  }}сум             
                <input type="hidden"  value="{{ $products->newPrice  }}" class="newPrice" id="price">     
                    <del class="small  text-danger" style="text-decoration: line-through">{{  $products->price }} сум</del></h3>

                 @else
                  <h3 class="ps-product__price changePrice"  >{{ $products->price  }}сум 
                  <input type="hidden"  value="{{ $products->price  }}" id="price">  
                  @endif
                </h3>
                <div class="ps-product__block ps-product__quickview">
                  <h3>Qisqacha Ma'lumot</h3>
                  <p>{{ $products->shortdesc  }}</p>
                </div>
                <div class="ps-product__block ps-product__style">
                  <h3>Dostavka</h3>
                 <p>{{ $products->delivery }} kun</p>
                </div>
                <div class="ps-product__block ps-product__size">
                  <h4>Miqdorini tanlang</h4>
                  <div class="form-group">
                    <input class="form-control" type="number" id="quantity" value="1" min="1">
                  </div>
                  <h3 class="total"></h3>
                  <input type="hidden" id="total" value="">
                </div>
                <div class="ps-product__shopping"><a class="ps-btn mb-10" id="addCart">Savatga qo'shish<i class="ps-icon-next"></i></a>
                  <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
                </div>
                <p><span class="glyphicon glyphicon-ok"></span> O'zbekiston bo'yicha yetkazib berish</p>
              </div>
              <div class="clearfix"></div>
              <div class="ps-product__content mt-50">
                <ul class="tab-list" role="tablist">
                  <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Umumiy tavsif</a></li>
                  <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Sharhlar</a></li>
                </ul>
              </div>
              <div class="tab-content mb-60">
                <div class="tab-pane active" role="tabpanel" id="tab_01">
                  <p>{{ $products->longdesc }}</p>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab_02">  
                
                  <div class="emptyFeed text-center">
                    @if($feedback->isEmpty())
                    <h1 class="glyphicon glyphicon-inbox"></h1>
                    <h3>Bu mahsulot uchun hozircha sharhlar mavjud emas</h3>
                    @endif 
                  </div>
                  
                  <div id="del-feed">
                  @if(isset($feedback))
                  @foreach($feedback as $f)
                    <div class="ps-review">
                    <div class="ps-review__thumbnail"><img src="/images/user/1.jpg" alt=""></div>
                    <div class="ps-review__content">
                      <header>
                        <select class="ps-rating">
                          <option value="1">1</option>
                          <option value="1">2</option>
                          <option value="1">3</option>
                          <option value="1">4</option>
                          <option value="5">5</option>
                        </select>
                        <p><a id="user_name"> {{ $f->fname.$f->lname}}</a> - <span  id="date">{{ $f->created_at }}</span></p>
                      </header>
                      <p id="ftext">{{ $f->text }}</p>
                    </div>
                  </div>
                @endforeach
                @endif 
                </div>
                @auth              
                  <div class="ps-product__review"  method="POST">
                    {{ csrf_field() }}
                    <h4>Sharh qoldirish</h4>
                    <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Rating<span></span></label>
                              <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Sizning sharhingiz:</label>                              
                              <textarea id="text" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                              <button  id="ajaxSubmit" class="ps-btn ps-btn--sm">Yuborish<i class="ps-icon-next"></i></button>
                            </div>
                          </div>
                    </div>
                  </div>
                @endauth
                @guest
                <p class="feedback" >Mahsulotga sharh qoldirish uchun <span style="cursor: pointer; color: #2AC37D; font-weight: bold"  data-toggle="modal" data-target="#loginModal">avtorizatsiyadan</span> o'ting.</p>
                @endguest
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Related item">- O'xshash mahsulotlar</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i></a><a class="ps-next" href="#"><i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
               @if(isset($similar))
                @foreach($similar as $p)
                <div class="ps-shoes--carousel" >               
                <div class="grid-item phones p-5 mt-10">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug, 'id' =>base64_encode($p->id), 'name' => $p->name]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $p->img }}" alt="{{ $p->name }}">
                          @if ( $p->new > 0 )
                           <span class="label label-success">Новый</span>
                          @endif
                          @if ( $p->discount > 0 )
                            <span class="label label-danger">-{{ $p->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="#" class="title">{{ $p->name }}
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
                </div>                   
                @endforeach
              @endif    
             </div>
          </div>
        </div>
      </div>
     @endif
      @endsection
    