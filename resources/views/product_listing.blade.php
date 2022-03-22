@extends('layouts.main')
@section('content') 
      <div class="ps-products-wrap pt-80 pb-80" >
        <h4 class="alert alert-warning">Hozirda filterlash tizimi ishlamaydi. Noqulaylik uchun uzr so'raymiz!</h4>
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product-action">
            <div class="ps-product__filter">
              <select class="ps-select selectpicker">
                <option value="1">A-Z</option>
                <option value="2">Z-A</option>
                <option value="3">Narxi (arzon)</option>
                <option value="3">Narxi (qimmat)</option>
              </select>
            </div>
          </div>
          <button class="filter btn btn-success ml-1" data-toggle="modal" data-target="#myModal"><i class="fas fa-filter" style="color: white;"></i>Filter</button>
        <div class="ps-product__columns" id="dataDiv">
          @if($products->isEmpty())
          <div class="emptyFeed text-center">                    
              <h1 class="glyphicon glyphicon-inbox" style="font-size: 100px"></h1>
              <h3 style="padding: 20px; color: #8a8888">Ushbu so'rov bo'yicha mahsulot mavjud emas!</h3>
            </div>           
              @else             
                @foreach($products as $p) 
                 <div class="ps-product__column">            
                  <div class="grid-item phones p-5 mt-10">
                    <div class="card-product-grid mb-0">
                      <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug,  'id' =>base64_encode($p->id),'name' => $p->name.$p->modelName]) }}" class="img-wrap">
                          <img class="lazyload" src="/images/products/{{ $p->img }}" alt="{{ $p->name }}">
                          @if ( $p->new > 0 )
                           <span class="label label-success">Новый</span>
                          @endif
                          @if ( $p->discount > 0 )
                            <span class="label label-danger">-{{ $p->discount }}%</span>
                          @endif  
                      </a>
                      <div class="info-wrap">
                        <a href="{{ route('productId',['category' => $p->cat_slug, 'subcat' => $p->slug,  'id' =>base64_encode($p->id),'name' => $p->name.$p->modelName]) }}" class="title">{{ $p->name }}
                          <p>{{ $p->modelName }}</p>
                        </a>
                          <div class="price-wrap">
                            @if($p->discount > 0)
                            <span class="small  text-danger" style="text-decoration: line-through">{{ $p->newPrice }} сум</span>
                            @endif
                            <br>
                            <span class="price font-weight-bold changePrice">{{ $p->price }} сум</span> 
                            </div> <!-- price.// -->
                        </div>
                    </div>
                  </div>
                </div>         
                @endforeach
              @endif                        
          </div>

        

<div class="ps-product-action">
  <div class="ps-pagination">
    @if ($products->hasPages())
      <ul class="pagination pagination">
          {{-- Previous Page Link --}}
          @if ($products->onFirstPage())
              <li class="disabled"><a>«</a></li>
          @else
              <li><a href="{{ $products->previousPageUrl() }}" rel="prev">«</a></li>
          @endif

          @if($products->currentPage() > 3)
              <li class="hidden-xs"><a href="{{ $products->url(1) }}">1</a></li>
          @endif
          @if($products->currentPage() > 4)
              <li><a>...</a></li>
          @endif
          @foreach(range(1, $products->lastPage()) as $i)
              @if($i >= $products->currentPage() - 1 && $i <= $products->currentPage() + 1)
                  @if ($i == $products->currentPage())
                      <li class="active"><a>{{ $i }}</a></li>
                  @else
                      <li><a href="{{ $products->url($i) }}">{{ $i }}</a></li>
                  @endif
              @endif
          @endforeach
          @if($products->currentPage() < $products->lastPage() - 3)
              <li><a>...</a></li>
          @endif
          @if($products->currentPage() < $products->lastPage() - 2)
              <li class="hidden-xs"><a href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
          @endif

          {{-- Next Page Link --}}
          @if ($products->hasMorePages())
              <li><a href="{{ $products->nextPageUrl() }}" rel="next">»</a></li>
          @else
              <li class="disabled"><a>»</a></li>
          @endif
      </ul>
  @endif
            </div>
          </div>
        </div>


    <div  method="get"> 
      {{csrf_field()}}
      <div class="descop ps-sidebar" data-mh="product-listing">
        @if(isset($subcat))
        <div class="ps-widget--sidebar ps-widget--category">
          <div class="ps-widget__header">
            @if(isset($title))
            <h3>{{ $title->cat_name }}</h3>
            @endif
          </div>
          <div class="ps-widget__content">
            <ul class="ps-list--checked">             
                @foreach($subcat as $s)
                 <li><input type="checkbox" name="subId" id="filterCheck" class="filterSub"  value="{{ $s->id }}" <?php if ($did == $s->id): ?>
                   checked
                 <?php endif ?>> </input> <span class="nameFilter" <?php if ($did == $s->id): ?>
                   id="filterSub"
                 <?php endif ?>>{{ $s->name }}</span></li>
                @endforeach            
            </ul>
          </div> 
        </div>
        @endif
        <div class="ps-widget--sidebar ps-widget--filter">
          <div class="ps-widget__header">
            <h3>Narx</h3>
          </div>
          <div class="ps-widget__content">
            <div class="ac-slider" data-default-min="30000" data-default-max="200000" data-max="100000000" data-step="50" data-unit="$"></div>
            <p class="ac-slider__meta">Narx:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p>
          </div>
        </div>
        @if(isset($company))
        <div class="ps-widget--sidebar ps-widget--category">
          <div class="ps-widget__header">
            <h3>Ishlab chiqaruvchi</h3>
          </div>
          <div class="ps-widget__content">
            <ul class="ps-list--checked">
              @foreach($company as $c)
              <li><input type="checkbox" name="company" class="" value="{{ $c->id }}"></input> <span class="nameFilter">{{ $c->name }}</span></li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif        
          <div class="ps-widget--sidebar">
            <div class="ps-widget__header">
              <h3>Rang</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><input type="checkbox" name="color[]" class="color" value="1"></input> <span class="nameFilter">Qora</span></li>
                <li><input type="checkbox" name="color[]" class="color" value="2"></input> <span class="nameFilter">Oq</span></li>
                <li><input type="checkbox" name="color[]" class="color" value="3"></input> <span class="nameFilter">Silver</span></li>
                <li><input type="checkbox" name="color[]" class="color" value="4"></input> <span class="nameFilter">Gold</span></li>
              </ul>
            </div>
          </div>
        <div class="ps-widget--sidebar ps-widget--category">
          <div class="ps-widget__header">
              <h3>Boshqa</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><input type="checkbox" name="new" class="color" value="1"></input> <span class="nameFilter">Yangi</span></li>
                <li><input type="checkbox" name="discount" class="color" value="1"></input> <span class="nameFilter">Chegirma</span></li>
              </ul>
            </div>
          </div>
        <button type="submit" id="ajaxsubmit" class="ac-slider__filter ps-btn">Filter</button>
      </div>
    </div>
    <!-- -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">  
            <div class="ps-sidebar" data-mh="product-listing">
              <div class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                  <h3>Kichik kategoriyalar</h3>
                </div>
                <div class="ps-widget__content">
                  <ul class="ps-list--checked">
                    @if(isset($subcat))
                      @foreach($subcat as $s)
                       <li><a href="product-listing.html">{{ $s->name }}</a></li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </div>
          <div class="ps-widget--sidebar ps-widget--filter">
            <div class="ps-widget__header">
              <h3>Narx</h3>
            </div>
            <div class="ps-widget__content">
              <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
              <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
            </div>
          </div>
          @if(isset($company))
          <div class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Ishlab chiqaruvchi</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                @foreach($company as $c)
                <li class=""><a href="product-listing.html">{{ $c->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
          <div class="ps-widget--sidebar">
            <div class="ps-widget__header">
              <h3>Rang</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><input type="checkbox" name="color[]" class="color" value="1"></input> <span class="nameFilter">Qora</span></li>
                <li><input type="checkbox" name="color[]" class="color" value="2"></input> <span class="nameFilter">Oq</span></li>
                <li><input type="checkbox" name="color[]" class="color" value="3"></input> <span class="nameFilter">Silver</span></li>
                <li><input type="checkbox" name="color[]" class="color" value="4"></input> <span class="nameFilter">Gold</span></li>
              </ul>
            </div>
          </div>
        <div class="ps-widget--sidebar ps-widget--category">
          <div class="ps-widget__header">
              <h3>Boshqa</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li><input type="checkbox" name="new" class="color" value="1"></input> <span class="nameFilter">Yangi</span></li>
                <li><input type="checkbox" name="discount" class="color" value="1"></input> <span class="nameFilter">Chegirma</span></li>
              </ul>
            </div>
          </div>
          <button type="submit" id="ajaxsubmit" class="ac-slider__filter ps-btn">Filter</button>
          </div>
        </div>
      </div>
    </div>
  </div>
      @endsection
     