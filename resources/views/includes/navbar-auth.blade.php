 <!-- Offcanvas Menu Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="offcanvas-menu-wrapper">
     <div class="offcanvas__close">+</div>
     <ul class="offcanvas__widget">
         <li><span class="icon_search search-switch"></span></li>
         <li><a href="{{ route('shop') }}"><span class="icon_bag_alt"></span>
             <div class="tip">2</div>
         </a></li>
     </ul>
     <div class="offcanvas__logo">
         <a href="{{ route('home') }}"><img src="img/logo.png" alt=""></a>
     </div>
 </div>
 <!-- Offcanvas Menu End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xl-3 col-lg-2">
                 <div class="header__logo">
                     <a href="{{ route('home') }}"><img src="img/logo.png" alt=""></a>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-7">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="{{ route('home') }}">Home</a></li>
                         <li><a href="{{ route('shop') }}">Shop</a></li>
                         <li><a href="{{ route('contact') }}">Contact</a></li>
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__right">
                     <ul class="header__right__widget">
                         <li><span class="icon_search search-switch"></span></li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="canvas__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->