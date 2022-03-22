@extends('layouts.main')
@section('content') 
<div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-checkout__form" method="post">
            <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>Yetkazib berish manzili</h3>
                      <p class=" errors"></p>
                      <div class="form-group" method="POST">
                        {{ csrf_field() }}
                         <div class="form-group form-group--inline">
                          <label class="" for="fname"  >Ism:</label><p>{{ $user->fname }}</p>
                        </div>
                         <div class="form-group form-group--inline">
                          <label class="" for="lname" >Familiya:</label>
                         <p>{{ $user->lname }}</p>
                        </div>
                         <div class="form-group form-group--inline">
                          <label class="" for="email" >Elektron pochta manzili:</label>
                           <p>{{ $user->email }}</p>
                         </div>
                          <div class="form-group form-group--inline">
                           <label class="" for="phone" >Telefon raqami:</label>
                         <p>{{ $user->phone }}</p>
                        </div>
                      @if($address->isEmpty())
                       <div class="form-group form-group--inline">
                          <label class="" for="region" >Viloyat</label>
                          <input  type="text" name="region" class="form-control userInput @error('region') is-invalid @enderror" value="{{ $address->region }}" required autocomplete="region" autofocus placeholder="Jizzax">
                        </div>
                         <div class="form-group form-group--inline">
                          <label class="" for="city" >Shahar/Tuman</label>
                          <input type="text" name="city" class="form-control userInput @error('city') is-invalid @enderror" value="{{ $address->city }}" required autocomplete="city" placeholder="Jizzax Shahar">
                        </div>
                         <div class="form-group form-group--inline">
                          <label class="" for="zipcode" >Zip kod</label>
                           <input  type="number" class="form-control userInput @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $address->zipcode }}" required autocomplete="zipcode" placeholder="100130">
                         </div>
                          <div class="form-group form-group--inline">
                           <label class="" for="address" >Manzil</label>
                          <input type="text" name="address" class="form-control userInput @error('address') is-invalid @enderror" value="{{ $address->address }}" required autocomplete="address" placeholder="O'zbekiston ko'chasi 11-uy">
                        </div>
                      @else                        
                         @foreach($address as $address)
                         <div class="form-group form-group--inline">
                          <label class="" for="region" >Viloyat:</label>
                          <p>{{ $address->region }}</p>
                        </div>
                         <div class="form-group form-group--inline">
                          <label class="" for="city" >Shahar/Tuman:</label>
                          <p>{{ $address->city }}</p>
                        </div>
                         <div class="form-group form-group--inline">
                          <label class="" for="zipcode" >Zip kod:</label>
                           <p>{{ $address->zipcode }}</p>
                         </div>
                          <div class="form-group form-group--inline">
                           <label class="" for="address" >Manzil:</label>
                          <p>{{ $address->address }}</p>
                        </div>
                        @endforeach
                        @endif 
                        <div >
                        <p>Ma'lumotlarning o'zgartirish uchun <a style="color: #2AC37D; font-weight: bold" href="{{ route('userDashboard') }}">shaxsiy kabinetga o'tib</a> ma'lumotlarni o'zgartirishingiz mumkin.</p>
                        </div>
                       </div> 
                      <h3 class="mt-40">qo'shimcha ma'lumot</h3>
                      <div class="form-group form-group--inline textarea">
                        <label>Buyurtma</label>
                        <textarea name="notes" class="form-control" rows="5" placeholder="buyurtmanggiz bo'yicha eslatmalar, e.g. yetqazib berish manzili bo'yicha ma'lumotlar."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order">
                      <header>
                        <h3>Sizning buyurtmanggiz</h3>
                      </header>
                      <div class="content">
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Maxsulot</th>
                              <th class="text-uppercase"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(isset($cartItems))
                            @foreach($cartItems as $c)
                            <tr>
                              <td>{{ $c->name }} <span class="text-success ">x{{ $c->quantity }}</span> </td>
                              <td>{{ $c->attributes->total }} so'm</td>
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                        <h3>Jami:  {{ $totalPrice }} so'm</h3>
                      </div>
                      <footer>
                        <h3>To'lov turi</h3>
                        <div class="form-group cheque">
                          <div class="ps-radio">
                            <input class="form-control" type="radio" id="rdo01" name="payment" checked value="1">
                            <label for="rdo01">Buyutma olingandan keyin to'lov</label>
                            <p>Buyurtma sizga yetkazib berilgandan so'ng naqd pul yoki plastik kartadan yetkazib beruvchiga to'lovni amalga oshirasiz.</p>
                          </div>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" name="payment" id="rdo02" disabled="true">
                            <label for="rdo02">Click</label>
                          </div>
                          <ul class="ps-payment-method">
                            <li><a href="#"><img src="/images/payment/1.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/payment/2.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/payment/3.png" alt=""></a></li>
                          </ul>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" name="payment" id="rdo02" disabled="true">
                            <label for="rdo02">Payme</label>
                          </div>
                          <ul class="ps-payment-method">
                            <li><a href="#"><img src="/images/payment/1.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/payment/2.png" alt=""></a></li>
                            <li><a href="#"><img src="/images/payment/3.png" alt=""></a></li>
                          </ul>
                          <p class="mt-10">hozirda uchbu to'lov turlari bo'yicha to'lovni amalga oshirolmaysiz.</p>
                          <button class="ps-btn ps-btn--fullwidth" id="giveOrder">Buyurtma berish<i class="ps-icon-next"></i></button>
                        </div>
                      </footer>
                    </div>
                    <div class="ps-shipping">
                      <h3>Bepul yetkazib berish</h3>
                      <p>Agar buyurtmaning umumiy qiymati 10mln so'mdan oshsa buyurtma bepul yetkazib beriladi.</p>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>

 @endsection        