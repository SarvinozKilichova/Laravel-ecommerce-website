<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Sky - Homepage</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ps-icon/style.css') }}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    

    <!-- Custom-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link rel="stylesheet" href="{{ asset('js/alertify/css/alertify.css') }}">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body class="ps-loading">
@section('abort')

@show
@section('navbar')
 <div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>Toshkent, Yakkasaroy tumani 1A-uy  Call-markaz: 804-377-3580 - 804-399-3580</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions">
                    @guest
                     @if (Route::has('register'))
                      <a class="nav-link" style="cursor: pointer" data-toggle="modal"  data-target="#loginModal">Kirish / Ro'yhatdan o'tish</a>
                     @endif
                     @else
                       <a class="nav-link" href="{{ route('userDashboard') }}" >Kabinet </a>

                    @endguest
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#"><img src="images/flag/usa.svg" alt=""> USD</a></li>
                        <li><a href="#"><img src="images/flag/singapore.svg" alt=""> SGD</a></li>
                        <li><a href="#"><img src="images/flag/japan.svg" alt=""> JPN</a></li>
                      </ul>
                    </div>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Til<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">O'zbek</a></li>
                        <li><a href="#">Russian</a></li>
                        <li><a href="#">English</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="{{ route('home') }}"><img src="/images/logo.png" alt=""></a></div>
          </div>
              <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{  route('home') }}">Bosh sahifa</a>                  
                  </li>
                  <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Katalog</a>
                    <div class="mega-menu">
                      <h5 class="alert alert-success">Hozirda faqat Gadjetlar bo'limida mahsulotlar mavjud!</h5>
                      <div class="mega-wrap">
                        <div class="mega-column">
                          <a href="{{ route('category',['category' => 'electronics', 'catId' => base64_encode("3")]) }}"><h4 class="mega-heading">Elektron texnikalar</h4></a> 
                          <ul class="mega-item">
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Portativ-elektronika', 'subid' => base64_encode("15") ]) }}">Portativ elektronika</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Televizorlar-va-video-texnika',  'subid' => base64_encode("16")]) }}">Televizorlar va video texnika</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Aqlli-elektronika',  'subid' => base64_encode("17")]) }}">Aqlli elektronika</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Oyinlar-va-konsollar',  'subid' => base64_encode("18")]) }}">O'yinlar va konsollar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Ovoz-tizimlari',  'subid' => base64_encode("19")]) }}">Ovoz tizimlari</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Aqlli-uy',  'subid' => base64_encode("20")]) }}">Aqlli uy</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Elektronika-uchun-aksessuarlar',  'subid' => base64_encode("21")]) }}">Elektronika uchun aksessuarlar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Foto-va-video-texnika',  'subid' => base64_encode("22")]) }}">Foto va video texnika</a></li>
                             <li><a href="{{ route('subcat',['category' => 'electronics', 'subcat'=>'Xavfsizlik-va-Himoya',  'subid' => base64_encode("24")]) }}">Xavfsizlik va Himoya</a></li>
                        </div>                       
                        <div class="mega-column">
                          <a href="{{ route('category',['category' => 'computers', 'catId' => base64_encode("2")]) }}"><h4 class="mega-heading">Kompyuterlar va Ofis jihozlari</h4></a>
                          <ul class="mega-item">
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Kompyuter-va-noutbuklar',  'subid' => base64_encode("7")]) }}">Kompyuter va noutbuklar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Aksessuarlar',  'subid' => base64_encode("8")]) }}">Aksessuarlar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Ofis-jihozlari',  'subid' => base64_encode("9")]) }}">Ofis jihozlari</a></li>
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Komponentlar',  'subid' => base64_encode("10")]) }}">Komponentlar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Dasturiy-taminot-va-oyinlar',  'subid' => base64_encode("14")]) }}">Dasturiy ta'minot va o'yinlar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Saqlash-moslamalari',  'subid' => base64_encode("11")]) }}">Saqlash moslamalari</a></li>
                             <li><a href="{{ route('subcat',['category' => 'computers', 'subcat'=>'Tarmoq-apparati',  'subid' => base64_encode("12")]) }}">Tarmoq apparati</a></li>  
                          </ul>
                        </div>
                         <div class="mega-column">
                          <a href="{{ route('category',['category' => 'mobiles', 'catId' => base64_encode("1")]) }}"><h4 class="mega-heading">Telefon va aksassuarlar</h4></a>
                          <ul class="mega-item">
                             <li><a href="{{ route('subcat',['category' => 'mobiles', 'subcat'=>'Mobil-telefonlar',  'subid' => base64_encode("1")]) }}">Mobil telefonlar </a></li>
                             <li><a href="{{ route('subcat',['category' => 'mobiles', 'subcat'=>'Gadjetlar',  'subid' => base64_encode("2")]) }}">Gadjetlar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'mobiles', 'subcat'=>'Eshitish-vositasi-va-naushnik',  'subid' => base64_encode("3")]) }}">Eshitish vositasi va naushnik</a></li>
                             <li><a href="{{ route('subcat',['category' => 'mobiles', 'subcat'=>'Ehtiyot-qismlar',  'subid' => base64_encode("4")]) }}">Ehtiyot qismlar</a></li>
                             <li><a href="{{ route('subcat',['category' => 'mobiles', 'subcat'=>'Smatfonlar-uchun-chexollar',  'subid' => base64_encode("5")]) }}">Smatfonlar uchun chexollar </a></li>
                             <li><a href="{{ route('subcat',['category' => 'mobiles', 'subcat'=>'Telefon-aksessuarlari',  'subid' => base64_encode("6")]) }}">Telefon aksessuarlari</a></li>
                          </ul>
                        </div>
                        <div class="mega-column">
                          <a href="{{ route('category',['category' => 'bitovaya', 'catId' => base64_encode("4")]) }}"><h4 class="mega-heading">Maishiy texnika</h4></a>
                          <ul class="mega-item">
                             <li><a href="{{ route('subcat',['category' => 'bitovaya', 'subcat'=>'Ichimliklarni-tayyorlash',  'subid' => base64_encode("25")]) }}">Ichimliklarni tayyorlash</a></li>
                             <li><a href="{{ route('subcat',['category' => 'bitovaya', 'subcat'=>'Tegirmon-mahsulotlari',  'subid' => base64_encode("26")]) }}">Tegirmon mahsulotlari</a></li>
                             <li><a href="{{ route('subcat',['category' => 'bitovaya', 'subcat'=>'Ovqat-pishirish',  'subid' => base64_encode("27")]) }}">Ovqat pishirish</a></li>
                             <li><a href="{{ route('subcat',['category' => 'bitovaya', 'subcat'=>'Katta-maishiy-texnika',  'subid' => base64_encode("28")]) }}">Katta maishiy texnika</a></li>
                             <li><a href="{{ route('subcat',['category' => 'bitovaya', 'subcat'=>'Uy-uchun-texnika',  'subid' => base64_encode("29")]) }}">Uy uchun texnika</a></li>
                             <li><a href="{{ route('subcat',['category' => 'bitovaya', 'subcat'=>'Gozallik-uchun-texnikalar',  'subid' => base64_encode("30")]) }}">Go'zallik uchun texnikalar</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('news') }}">yangiliklar</a></li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('contact')}}">Aloqa</a>
                  </li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="{{ route('search') }}" method="get">
              <input class="form-control" type="text" placeholder="qidirish…" name="search">
              <button><i class="ps-icon-search"></i></button>
            </form>
            <div class="menu-toggle"><span></span></div>
            <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i id="count">{{ $total }}</i></span><i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
                <div class="ps-cart__content" id="ps-cart__content">
                  @if(\Cart::isEmpty())
                  <h3 class="text-center" style="color: white; padding-bottom: 20px;">Mahsulot yo'q...</h3>
                  @else
                  @auth
                  @foreach($cartItems as $c)
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="{{ route('deleteCart', ['id' => $c->id]) }}"></a>
                    <div class="ps-cart-item__thumbnail"><img src="{{ $c->attributes->image  }}" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="#">{{ $c->name }}</a>
                      <p><span>Soni:<i>{{ $c->quantity }}</i></span><span>Total:<i>{{ $c->price }} so'm</i></span></p>
                    </div>
                  </div>
                  @break(count($cartItems) > 4) 
                  @endforeach
                </div>
                <div class="ps-cart__total">
                  <p>Mahsulotlar soni:<span id="countQuantity">{{ $total }}</span></p>
                  <p>Umumiy narxi:<span id="totalPrice">{{ $totalPrice }} so'm</span></p>
                </div>
                <div class="ps-cart__footer"><a class="ps-btn" href="{{ route('cart') }}">Savat<i class="ps-icon-arrow-left"></i></a></div>
              </div>               
              @endauth             
             @endif
             @if(auth() == null)
              <h3 class="text-center" style="color: white; padding-bottom: 20px;">Mahsulot yo'q...</h3>
              @endif
            </div>
            
          </div>
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Tez va Qulay</strong>: Biz bilan Mahsulotlari tez va oson sotib oling</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Yetkazib berish</strong>: Tezda yetkazib berish xizmati</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Yuqori Sifat</strong>: Keng turdagi yuqori sifatli mahsulotlar</p>
      </div>
    </div>
@include('layouts.login')
@include('layouts.register')
   <main class="ps-main">
@show
@section('content')





@show
@section('footer')
      <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                  <h3><i class="fa fa-envelope"></i>Yangiliklarga ulaning</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>A'zo bo'lish</button>
                  </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                  <p>...va  <span>20%</span>  chegirma egasiga aylaning!</p>
                </div>
          </div>
        </div>
      </div>
      <div class="ps-footer bg--cover" data-background="images/banner/images.jpg">
        <div class="ps-footer__content">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                      <header><a class="ps-logo" href="{{ route('home') }}"><img src="/images/logo-white.png" alt=""></a>
                        <h3 class="ps-widget__title">Ofis manzili</h3>
                      </header>
                      <footer>
                        <p><strong>1A-uy, Yakkasaroy Tumani, Toshkent </strong></p>
                        <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                        <p>Telefon: +323 32434 5334</p>
                        <p>Fax: ++323 32434 5333</p>
                      </footer>
                    </aside>
                  </div>                 
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Yordam</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Buyurtma Holati</a></li>
                          <li><a href="#">Yetkazib Berish</a></li>
                          <li><a href="#">Qaytarib Berish</a></li>
                          <li><a href="#">To'lov Turlari</a></li>
                          <li><a href="#">Biz bilan bog'lanish</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Kategoriyalar</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Elektron texnikalar</a></li>
                          <li><a href="#">Mobil Telefonlar</a></li>
                          <li><a href="#">Maishiy texnikalar</a></li>
                          <li><a href="#">Kompyuterlar</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>

            </div>
          </div>
        </div>
        <div class="ps-footer__copyright">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">SKYTHEMES</a>, Barcha huquqlar himoyalangan, <a href="#">Sarvinoz Kilichova</a> tomonidan tayyorlangan</p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    @show
    
    <!-- JS Library-->
    <script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/imagesloaded.pkgd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jquery.matchHeight-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/slick/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    
        <!-- Custom scripts-->

    <script type="text/javascript" src="{{ asset('js/shoe-variants.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('js/alertify/alertify.js') }}"></script>

  </body>
</html>    