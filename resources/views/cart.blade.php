@extends('layouts.main')
@section('content')
@if(Session::has('message'))
    <div class="alert alert-success text-center">{{ Session::get('message') }}
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>

@endif
  <div class="ps-content pt-30 pb-80">
        <div class="ps-container">
          <div class="ps-cart-listing">
            @if(\Cart::isEmpty())
                <div class="emptyFeed text-center">                    
                    <h1 class="glyphicon glyphicon-shopping-cart" style="font-size: 100px"></h1>
                    <h3 style="padding: 20px; color: #8a8888">Savatda mahsulot mavjud emas</h3>
                  </div>
                  @else
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Barcha Mahsulotlar</th>
                  <th>Narx</th>
                  <th>Soni</th>
                  <th>Umumiy Qiymati</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($cartItems as $p)
                <form action="{{ route('updateCart', ['id' => $p->id ]) }}" method="get">
                <tr>                  
                  <td><a class="ps-product__preview" href="{{ route('productId',['category' =>  $p->attributes->cat_slug, 'subcat' =>  $p->attributes->sub_slug, 'id' =>base64_encode($p->id), 'name' => $p->name]) }}"><img class=" cartImg mr-15" src="{{ $p->attributes->image }}" alt=""> {{ $p->name }}</a></td>
                 
                  <td class="price">{{ $p->price }} so'm</td>
                  <input type="hidden" id="price" value="{{ $p->price }}">
                  <td>
                    <div class="form-group--number">
                      <input class="form-control" type="number" id ="quantity" name="quantity" value="{{ $p->quantity }}" min="1">
                      <input type="hidden" id="productId" value="{{ $p->id }}">
                    </div>
                  </td>
                  <td class="totalCart">{{ $subTotal }} so'm</td>
                  <input type="hidden" class="inTotal"  value="{{ $p->total }}">
                  <td>

                    <a href="{{ route('deleteCart', ['id' => $p->id]) }}" class="ps-remove" id="deleteItem"></a>
                    <button  id="ps-update"><span class="glyphicon glyphicon-refresh"></span></button>
                  </td>
                </tr>
                </form>
                @endforeach 
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__total">
                <h3>Umumiy qiymati: <span id="totalSum">{{ $totalPrice }} so'm</span></h3><a class="ps-btn" href="{{ route('checkout') }}">Sotib olish<i class="ps-icon-next"></i></a>
              </div>
            </div>
            @endif 
          </div>
        </div>
      </div>  
 @endsection      