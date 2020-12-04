@extends('layouts.app')

@section('title')
    Shop Page
@endsection

@section('content')
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}><i class="fa fa-home"></i> Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
    
        <!-- Shop Section Begin -->
        <section class="shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="shop__sidebar">
                            <div class="sidebar__categories">
                                <div class="section-title">
                                    <h4>Categories</h4>
                                </div>
                                @foreach ($categories as $category)
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a style="color: black;text-decoration:none" href="{{ route('shop-detail-categories', $category->slug) }}">{{ $category->name }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="
                                        @if($product->galleries->count() )
                                        {{ Storage::url($product->galleries->first()->photos) }}
                                        @else
                    
                                        @endif">
                                        <ul class="product__hover">
                                            <li><a href="img/product/product-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
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
                            @endforeach
                            <div class="col-lg-12 text-center">
                                <div class="pagination__option">
                                    <a href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->    
@endsection