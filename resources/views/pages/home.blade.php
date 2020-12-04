@extends('layouts.app')

@section('title')
    Home Page
@endsection

@section('content')
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            @forelse ($categories as $category)
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                data-setbg="{{ Storage::url($category->photo) }}">
                    <div class="categories__text">
                        <h1>{{ $category->name }}</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                        edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="{{ route('categories-detail', $category->slug) }}">Shop now</a>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
        </div>
</div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="section-title">
                <h4>All Product</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <ul class="filter__controls">
                <li class="" data-filter="*">
                    <a style="color: black;" href="{{ route('home') }}" >All</a>
                  </li>
                @foreach ($categories as $category)
                <li class="" data-filter="*">
                  <a style="color: black;" href="{{ route('home-detail-categories', $category->slug) }}" >{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row property__gallery">
        @forelse ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix women">
            <div class="product__item">
                <div class="product__item__pic set-bg" 
                data-setbg="
                    @if($product->galleries->count())
                    {{ Storage::url($product->galleries->first()->photos) }}
                    @else

                    @endif">
                    <div class="label new">New</div>
                    <ul class="product__hover">
                        <li><a href="{{ Storage::url($product->galleries->first()->photos) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="{{ route('product-detail', $product->slug) }}"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div> 
                <div class="product__item__text">
                    <h6><a href="#">{{ $product->name }}</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">$ {{ $product->price }}</div>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>
</section>
<!-- Product Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="trend__content">
                <div class="section-title">
                    <h4>Hot Trend</h4>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/ht-1.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Chain bucket bag</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/ht-2.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Pendant earrings</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/ht-3.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Cotton T-Shirt</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="trend__content">
                <div class="section-title">
                    <h4>Best seller</h4>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/bs-1.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Cotton T-Shirt</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/bs-2.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Zip-pockets pebbled tote <br />briefcase</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/bs-3.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Round leather bag</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="trend__content">
                <div class="section-title">
                    <h4>Feature</h4>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/f-1.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Bow wrap skirt</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/f-2.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Metallic earrings</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/f-3.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Flap cross-body bag</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ 59.0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Trend Section End -->

<!-- Services Section Begin -->
<section class="services spad">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-car"></i>
                <h6>Free Shipping</h6>
                <p>For all oder over $99</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-money"></i>
                <h6>Money Back Guarantee</h6>
                <p>If good have Problems</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-support"></i>
                <h6>Online Support 24/7</h6>
                <p>Dedicated support</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-headphones"></i>
                <h6>Payment Secure</h6>
                <p>100% secure payment</p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Services Section End -->
@endsection