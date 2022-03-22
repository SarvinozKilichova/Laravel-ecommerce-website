@extends('layouts.main')

@section('content')

<!-- screen in laptop filters -->
<div class="n">
	<div class="row p-0 m-0" >
		<div class="col-md-3 col-lg-2 bg-white shadow-lg p-0 m-0"  >
		<form action=" {{ route('telefon') }}" method="GET" class="sticky-top">
			<h5 class="pl-1 font-weight-bolder">Цена</h5>
			<div class="pl-3 border-bottom border-dark pb-3">
				от: <input type="number" name="cost_from" placeholder="0" class="from-control mb-2" style="width: 60%"><br>
				до: <input type="number" name="cost_to" placeholder="0" class="from-control" style="width: 60%">
			</div>

		<h5 class="pl-1 font-weight-bolder">Бренды</h5>	
				<div class="pl-3 border-bottom border-dark pb-3">
				<div class="from-check">
				<label class="form-check-label" for="apple">
				<input type="checkbox" name="company[]" value="apple"/><span class="pl-3">Apple</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="samsung">
				<input type="checkbox" name="company[]" value="samsung"  /><span class="pl-3">Samsung</span> 
				</label>	
				</div>
				
				<div class="from-check">
				<label class="form-check-label" for="huawei">
				<input type="checkbox" name="company[]" value="huawei" /><span class="pl-3">Huawei</span> 
				</label>	
				</div>
				
				<div class="from-check">
				<label class="form-check-label" for="lg">
				<input type="checkbox" name="company[]" value="lg" / ><span class="pl-3">LG</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="xiaomi">
				<input type="checkbox"name="company[]" value="xiaomi" /><span class="pl-3">Xiaomi</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="meizu">
				<input type="checkbox" name="company[]" value="meizu" /><span class="pl-3">Meizu</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="nokia">
				<input type="checkbox" name="company[]"  value="nokia" / ><span class="pl-3">Nokia</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="other">
				<input type="checkbox"  name="company[]" value="other"  /><span class="pl-3">другие</span> 
				</label>	
				</div>					
				</div>

				<h5 class="pl-1 font-weight-bolder ">Цвет</h5>
				<div class="pl-3 border-bottom border-dark pb-5 d-flex justify-content-center">
					<div class="bg-danger rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="red" class="ml-1 mr-2 mt-1" >
					<div class="bg-dark rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="black" class="ml-1 mr-2 mt-1" >
					<div class="bg-secondary rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="secondary" class="ml-1 mr-2 mt-1" >
					<div class="bg-warning rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="yellow" class="ml-1 mr-2 mt-1" >
					<div class="bg-white rounded-circle border border-dark" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="white" class="ml-1 mr-2 mt-1 " >
				</div>

						<h5 class="pl-1 font-weight-bolder ">Скидка</h5>
						<div class="pl-3 pb-3 ">
							есть: <input type="checkbox" name="discountOn"class="mr-3">
							нет: <input type="checkbox" name="discountOff">
						</div>
						<input type="submit" class="btn btn-danger ml-4 mb-2" value="сброс"></button>
						<input type="submit" class="btn btn-primary mb-2" value="филтер"></button>
					 </form>  
					</div>		
<!-- screen in laptop filters -->
		<div class="col-md-9 col-lg-10">							
			<div class=" d-flex justify-content-center mt-2">				
				<button class="btn border border-danger text-dark mr-5 " style="width: 120px;" onclick="w3.sortHTML('#id01', '.col-lg-2')"> А-Z <i class="fa fa-sort ml-5"></i></button>

			        <button class="btn border border-danger text-dark  " style="width: 130px;" onclick="w3.sortHTML('#id01', '.col-lg-2', 'p')"> цена  <i class="fa fa-sort ml-5"></i></button>	           		
			        <span class="ml-5">виды</span>
			        <i class="fa fa-list ml-3 pt-2" style="color: red"></i>
			        <i class="fa fa-th-large ml-3 pt-2"  style="color: red"></i>


			</div>
	
<!-- screen in laptop PRODUCTS -->

	@if(isset($phone))	
	we found {{ count($phone) }} products
	<div class="container col-md-12 ">
   	 <div class="row justify-content-center" id="id01">		
		@foreach($phone as $p)
		<a href="#">
          <div  class="col-lg-2 col-md-4 col-6 p-2 text-justify w3-animate-zoom justify-content-center w3-hover-red" >
            <div class="card mt-1"  > 
                <img src="/images/{!!  $p->img !!}" class="card-img-top img-fluid">      
                <div class="card-body ">
                 <a href="#" class="card-title text-success "> <h6 class="text-center m-0 p-0">{!! $p->name !!}</h6></a>
                  <div class="card-text">          
                <p class="text-center text-danger m-0 p-0">{{ $p->price }} tengi </p>
                <button class="btn btn-danger  mb-1 w-100 ">добавить<i class=" fas fa-cart-arrow-down  pr-1 "></i></button>         
                  </div>       
                </div>      
              </div>  
            </div>   
        </a>
        @endforeach
    </div>
</div>
	@endif			
			{{ $phone->links() }}
		</div>
	</div>
</div>

<!-- screen in mobile filters -->
<div class="phoneN">

	<div class=" d-flex justify-content-center mt-3 p-2">		
				<button class="btn border border-secondary text-dark mr-2 bg-white " style="width: 20%;" onclick="w3.sortHTML('#id01', '.col-6')"> А-Z <i class="fa fa-sort "></i></button>
			        <button class="btn border border-secondary text-dark bg-white " style="width: 25%;" onclick="w3.sortHTML('#id01', '.col-6', 'p')">цена <i class="fa fa-sort "></i></button>			         		
			       <button class="btn bg-white border border-dark ml-1" data-toggle="modal" data-target="#myModal"><i class="fas fa-filter" style="color: red;"></i>фильтры</button>
			        <i class="fa fa-list ml-3 pt-2 mt-1" style="color: red"></i>
			        <i class="fa fa-th-large ml-3 pt-2 mt-1"  style="color: red"></i>			        
			</div>

<!-- screen in mobile filters -->
	<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
     	<form action=" {{ route('telefon') }}" method="GET">
			<h5 class="pl-1 font-weight-bolder">Цена</h5>
			<div class="pl-3 border-bottom border-dark pb-3 ">
				от: <input type="number" name="cost_from" placeholder="10.00" class="from-control mb-2" style="width: 60%"> <br>
				до: <input type="number" name="cost_to" placeholder="1000000.00" class="from-control mb-2 mr-2" style="width: 60%">
			 </div>

		      <h5 class="pl-1 font-weight-bolder">Бренды</h5>	
				<div class="pl-3 border-bottom border-dark pb-3">
				<div class="from-check">
				<label class="form-check-label" for="apple">
				<input type="checkbox" name="company[]" value="apple"/><span class="pl-3">Apple</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="samsung">
				<input type="checkbox" name="company[]" value="samsung"  /><span class="pl-3">Samsung</span> 
				</label>	
				</div>
				
				<div class="from-check">
				<label class="form-check-label" for="huawei">
				<input type="checkbox" name="company[]" value="huawei" /><span class="pl-3">Huawei</span> 
				</label>	
				</div>
				
				<div class="from-check">
				<label class="form-check-label" for="lg">
				<input type="checkbox" name="company[]" value="lg" / ><span class="pl-3">LG</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="xiaomi">
				<input type="checkbox"name="company[]" value="xiaomi" /><span class="pl-3">Xiaomi</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="meizu">
				<input type="checkbox" name="company[]" value="meizu" /><span class="pl-3">Meizu</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="nokia">
				<input type="checkbox" name="company[]"  value="nokia" / ><span class="pl-3">Nokia</span> 
				</label>	
				</div>

				<div class="from-check">
				<label class="form-check-label" for="other">
				<input type="checkbox"  name="company[]" value="other"  /><span class="pl-3">другие</span> 
				</label>	
				</div>					
				</div>

				<h5 class="pl-1 font-weight-bolder ">Цвет</h5>
				<div class="pl-3 border-bottom border-dark pb-5 d-flex justify-content-center">
					<div class="bg-danger rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="red" class="ml-1 mr-2 mt-1" >
					<div class="bg-dark rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="black" class="ml-1 mr-2 mt-1" >
					<div class="bg-secondary rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="secondary" class="ml-1 mr-2 mt-1" >
					<div class="bg-warning rounded-circle" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="yellow" class="ml-1 mr-2 mt-1" >
					<div class="bg-white rounded-circle border border-dark" style="height: 20px; width: 20px "></div><input type="checkbox" name="color[]" value="white" class="ml-1 mr-2 mt-1 " >
				</div>
						<h5 class="pl-1 font-weight-bolder ">Скидка</h5>
						<div class="pl-3 pb-3 ">
							есть: <input type="checkbox" name="discountOn"class="mr-3">
							нет: <input type="checkbox" name="discountOff">
						</div>
						<div class=" d-flex justify-content-center">
						<input type="submit" class="btn btn-danger  mb-2 mr-2 " style="width: 40%" value="сброс"></button>
						<input type="submit" class="btn btn-primary mb-2" style="width: 40%" value="филтер"></button>
					</div>
			</form>
      </div>
    </div>
  </div>
			
	<!-- screen in mobile products -->
	@if(isset($phone))	
		<div class="container col-12 ">
	   	 <div class="row justify-content-center mb-3" id="id01">		
			@foreach($phone as $p)
			<a href="#">
	          <div  class=" col-6 p-2 text-justify w3-animate-zoom justify-content-center w3-hover-red" id="counting">
	            <div class="card mt-1"> 
	                <img src="/images/{!!  $p->img !!}" class="card-img-top img-fluid">      
	                <div class="card-body ">
	                 <a href="#" class="card-title text-success "> <h6 class="text-center m-0 p-0">{!! $p->name !!}</h6></a>
	                  <div class="card-text">          
	                <p class="text-center text-danger m-0 p-0">{{ $p->price }} tengi </p>
	                <button class="btn btn-danger  mb-1 w-100 ">добавить<i class=" fas fa-cart-arrow-down  pr-1 "></i></button>      
	                  </div>       
	                </div>      
	              </div>  
	            </div>   
	        </a>
	        
	        @endforeach
	    </div>
		</div>

	@endif
	</div>		
					
<script >
	function sort(){
	var s =document.getElementById('name');
	s.sort();	
	}
	

</script>





@endsection