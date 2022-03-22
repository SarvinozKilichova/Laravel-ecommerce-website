@extends('layouts.main')
@section('content')
<div class="ps-content pt-80 pb-80">
	<div class="ps-container row">
		@if (session('status'))
			<div class="alert alert-success m-5" >
			    {{ session('status') }}
			</div>
		@endif

		<div class="tab col-md-3">
		  <h3 class="cabinet">Shaxsiy Kabinet</h3>			
		  <button class="tablinks" onclick="openCity(event, 'personal')" id="defaultOpen">Shaxsiy ma'lumotlar</button>
		   <button class="tablinks" onclick="openCity(event, 'address')" id="defaultOpen">Yetkazib berish manzili</button>
		  <a href="{{ route('cart') }}"><button class="tablinks">Savat</button></a>
		  <button class="tablinks" onclick="openCity(event, 'order')">Buyurtmalar</button>
		  <button class="tablinks" onclick="openCity(event, 'payment')">To'lovlar</button>
		  <button class="tablinks" onclick="openCity(event, 'change')">Parolni o'zgartirish</button>
		  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><button class="tablinks">Chiqish</button></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">          @csrf
          </form>
		</div>
		<div class="col-md-9">
		<div id="personal" class="tab_content">
		  <h2>Shaxsiy ma'lumotlar</h2>
		  @if(isset($user))
		  	<div class="form-group" method="POST">
		  		{{ csrf_field() }}
		  		<div class="col-md-6 ruleUser">
			  		<label class="label-control" for="fname"  >Ism</label>
				  	<input  type="text" name="f_name" class="form-control userInput @error('fname') is-invalid @enderror" value="{{ $user->fname }}" required="required" autocomplete="fname" autofocus required placeholder="Sarvinoz">
				  	<label class="label-control" for="lname" >Familiya</label>
				  	<input type="text" name="l_name" class="form-control userInput @error('lname') is-invalid @enderror" value="{{ $user->lname }}" required autocomplete="lname " required placeholder="Kilichova">
				  	<label class="label-control" for="email" >Elektron pochta manzili</label>
				  	 <input type="email" name="userEmail" class="form-control userInput @error('email') is-invalid @enderror" value="{{ $user->email }}" required autocomplete="email " required placeholder="user@gmail.com">
				  	 <label class="label-control" for="phone" >Telefon raqami</label>
				  	<input type="number" name="phoneNumber" class="form-control userInput @error('phone') is-invalid @enderror" value="{{ $user->phone }}" required autocomplete="phone" required placeholder="99-999-99-99">
				  	<button id="saveUser" class="ps-btn" >Saqlash</button>
				  	<div id="error">
				   		<ol class="errors">				   			
				   		</ol>
			   		</div>
		  		</div>
		  		<div class="col-md-6 notice">
		  			<h4 >Eslatmalar</h4>
		  			<ol>
		  				<li>Ushbu shaxsiy ma'lumotlar mahsulot yetkazib berishda foydalaniladi shuning uchun ularni qayta tekshirib keyin saqlashingizni maslahat beramiz.</li>
		  			</ol>
		  		</div>
		   	</div>
		</div>
@endif
		@if(isset($address))
		@foreach($address as $a)
		<div id="address" class="tab_content">
		  <h2>Yetkazib berish manzili</h2>
		  	<div class="form-group" method="POST">
		  		{{ csrf_field() }}
		  		<div class="col-md-6 ruleUser">
			  		<label class="label-control" for="region" >Viloyat</label>
				  	<input  type="text" name="region" class="form-control userInput @error('region') is-invalid @enderror" value="{{ $a->region }}" required autocomplete="region" autofocus placeholder="Jizzax">
				  	<label class="label-control" for="city" >Shahar/Tuman</label>
				  	<input type="text" name="city" class="form-control userInput @error('city') is-invalid @enderror" value="{{ $a->city }}" required autocomplete="city" placeholder="Jizzax Shahar">
				  	<label class="label-control" for="zipcode" >Zip kod</label>
				  	 <input  type="number" class="form-control userInput @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $a->zipcode }}" required autocomplete="zipcode" placeholder="100130">
				  	 <label class="label-control" for="address" >Manzil</label>
				  	<input type="text" name="address" class="form-control userInput @error('address') is-invalid @enderror" value="{{ $a->address }}" required autocomplete="address" placeholder="O'zbekiston ko'chasi 11-uy">
				  	<button id="saveAddress" class="ps-btn" >Saqlash</button>
				  	<div id="error">
				   		<ol class="errorAdd">		   			
				   		</ol>
			   		</div>
		  		</div>
		  		<div class="col-md-6 notice">
		  			<h4 >Eslatmalar</h4>
		  			<ol>
		  				<li>Ushbu ma'lumotlar mahsulot yetkazib berishda foydalaniladi va ko'rsatilgan manzilga olib boriladi shuning uchun ularni qayta tekshirib keyin saqlashingizni so'rab qolamiz.</li>
		  			</ol>
		  		</div>
		  		
		   	</div>
		</div>
		@endforeach
		@endif
		<div id="address" class="tab_content">
		  <h2>Yetkazib berish manzili</h2>
		  	<div class="form-group" method="POST">
		  		{{ csrf_field() }}
		  		<div class="col-md-6 ruleUser">
			  		<label class="label-control" for="region" >Viloyat</label>
				  	<input  type="text" name="region" class="form-control userInput @error('region') is-invalid @enderror" value="" required autocomplete="region" autofocus placeholder="Jizzax">
				  	<label class="label-control" for="city" >Shahar/Tuman</label>
				  	<input type="text" name="city" class="form-control userInput @error('city') is-invalid @enderror" value="" required autocomplete="city" placeholder="Jizzax Shahar">
				  	<label class="label-control" for="zipcode" >Zip kod</label>
				  	 <input  type="number" class="form-control userInput @error('zipcode') is-invalid @enderror" name="zipcode" value="" required autocomplete="zipcode" placeholder="100130">
				  	 <label class="label-control" for="address" >Manzil</label>
				  	<input type="text" name="address" class="form-control userInput @error('address') is-invalid @enderror" value="" required autocomplete="address" placeholder="O'zbekiston ko'chasi 11-uy">
				  	<button id="saveAddress" class="ps-btn" >Saqlash</button>
				  	<div id="error">
				   		<ol class="errorAdd">		   			
				   		</ol>
			   		</div>
		  		</div>
		  		<div class="col-md-6 notice">
		  			<h4 >Eslatmalar</h4>
		  			<ol>
		  				<li>Ushbu ma'lumotlar mahsulot yetkazib berishda foydalaniladi va ko'rsatilgan manzilga olib boriladi shuning uchun ularni qayta tekshirib keyin saqlashingizni so'rab qolamiz.</li>
		  			</ol>
		  		</div>
		  		
		   	</div>
		</div>
		<div id="order" class="tab_content">
		  <h2>Buyurtmalar</h2>
		  <p>Paris is the capital of France.</p> 
		</div>

		<div id="payment" class="tab_content">
		  <h2>To'lovlar</h2>
		    <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>To'lov turi</th>
                  <th>Qiymati</th>
                  <th>Holati</th>
                </tr>
              </thead>
              <tbody>
              	@if(isset($payment))
                @foreach($payment as $p)
                <tr>                  
                  <td>{{ $p->paymentType }}</td>
                  <td>{{ $p->total }}  so'm</td>
                  @if( $p->allowed == 1 )
                  <td class="status"><button class="btn btn-success">To'langan</button> </td>
                  @elseif( $p->allowed == 2 )
                  <td class="status"><button class="btn btn-warning"> Kutilmoqda</button></td>
                  @else
                  <td class="status"><button class="btn btn-danger"> To'lanmagan</button></td>
                  @endif
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
		</div>	

		<div id="change" class="tab_content">
		  <h2>Parolni o'zgartirish</h2>
		  <div class="form-group" method="POST">
		  		<div class="col-md-6">
		  			{{ csrf_field() }}
			  		<label class="label-control" for="password"  >Joriy Parol</label>
				  	<input  type="text" name="userPass" class="form-control" required autocomplete="password" autofocus placeholder="parol" value="{{old('userPass')}}">
				  	<label class="label-control" for="newPassword" >Yangi Parol</label>
				  	 <input type="text" name="newPassword" class="form-control" required autocomplete="newPassword " placeholder="yangi parol">
				  	<label class="label-control" for="confirmPass" >Parolni tasdiqlash</label>
				  	 <input type="text" name="confirmPass" class="form-control" required autocomplete="confirPass " placeholder="yangi parol">		
				  	 <div id="error" class="col-md-12">
			   		<ol class="error">		   			
			   		</ol>
			   		</div>
				  	 <button id="changePass" class="ps-btn mt-20">saqlash</button>
		  		</div>
		  		<div class="col-md-6 rulePass">
		  			<h4 >Parol o'rnatish bo'yicha talablar</h4>
		  			<ol>
		  				<li>1. Parol kamida 8 ta belgidan iborat bo'lishi kerak.</li>
		  				<li>2. Parol tarkibida kamida bitta katta harf va son bo'lishi kerak.</li>
		  				<li>3. Parolda @,$,#,-,_ belgilaridan foydalanish mumkin.</li>
		  				<li>4. Parol kiritilganda belgilar orasida bo'sh joy tashlab yozish mumkin emas.</li>
		  			</ol>
		  		</div>
		   </div>
		</div>	
		</div>
		
	</div>
</div>	


@endsection      