@extends('layouts.app')

@section('title')
    Shop Cart Page
@endsection

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <div class="shop__cart__table">
                    <table>
                        <thead>
                          <tr>
                            <th>Product &amp; Seller</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0
                            @endphp
                            @foreach ($carts as $cart)
                            <tr>
                            <td class="cart__product__item">
                              @if ($cart->product->galleries)
                                <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" alt="" style="width: 20%;>
                                <div class="cart__product__item__title">
                                  <h6>{{ $cart->product->name }}</h6>
                                  <div class="rating">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                  </div>
                              </div>
                              @endif
                            </td>
                            <td class="cart__price">$ {{ number_format($cart->product->price) }}
                            </td>
                            <td class="cart__quantity">
                              <div class="pro-qty">
                                <input type="number" value="1">
                              </div>
                            </td>
                            <td class="cart__total">$ {{ number_format($cart->product->price) }}</td>
                            <td class="cart__close">
                              <form action="{{ route('shop-cart-delete', $cart->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-remove-cart"><span class="icon_close"></span></button>
                              </form>
                            </td>
                            </tr>
                            @php
                                $totalPrice += $cart->product->price
                            @endphp   
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="cart__btn">
                          <a href="{{ route('shop') }}">Continue Shopping</a>
                      </div>
                  </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                  <div class="col-12">
                    <h2 class="mb-4 text-center">Shipping Details</h2>
                  </div>
                </div>

                <form action="#" method="POST" id="locations" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address_one">Address 1</label>
                          <input type="text" class="form-control" id="address_one" name="address_one" value="Setra Duta Cemara">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address_two">Address 2</label>
                          <input type="text" class="form-control" id="address_two" name="address_two" value="Blok B2 No. 34">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="provinces_id">Province</label>
                          <select name="provinces_id" id="provinces_id" v-if="provinces" v-model="provinces_id" class="form-control">
                            <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                          </select>
                          <select v-else class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="regencies_id">City</label>
                          <select name="regencies_id" id="regencies_id" v-if="provinces" v-model="regencies_id" class="form-control">
                            <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                          </select>
                          <select v-else class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="zip_code">Postal Code</label>
                          <input type="text" class="form-control" id="zip_code" name="zip_code" value="123999">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="country">Country</label>
                          <input type="text" class="form-control" id="country" name="country" value="Indonesia">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone_number">Mobile</label>
                          <input type="text" class="form-control" id="mobile" name="mobile" value="+628 2020 11111">
                        </div>
                      </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                      <div class="col-12">
                        <hr>
                      </div>
                      <div class="col-12">
                        <h2 class="mb-1">Payment Informations</h2>
                      </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                          <div class="product-title">$0</div>
                          <div class="product-subtitle">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-3">
                          <div class="product-title">$0</div>
                          <div class="product-subtitle">Product Insurance</div>
                        </div>
                        <div class="col-4 col-md-2">
                          <div class="product-title">$0</div>
                          <div class="product-subtitle">Ship to Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2">
                          <div class="product-title text-success">$ {{ number_format($totalPrice ?? 0 ) }}</div>
                          <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                          <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now
                          </button>
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                  <div class="col-lg-6">
                    <div class="discount__content">
                      <h6>Discount codes</h6>
                      <form action="#">
                          <input type="text" placeholder="Enter your coupon code">
                          <button type="submit" class="site-btn">Apply</button>
                      </form>
                    </div>
                  </div>
                </div>
          </div> 
    </section>
    <!-- Shop Cart Section End -->
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.min.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>
    var locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
               provinces: null,
               regencies: null,
               provinces_id: null,
               regencies_id: null
            },
            methods: {
                getProvincesData() {
                  var self = this;
                  axios.get('{{ route('api-provinces') }}')
                        .then(function(response){
                          self.provinces = response.data;
                        })
                },
                getRegenciesData() {
                  var self = this;
                  axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response){
                          self.regencies = response.data;
                        })
                },
            },
            watch: {
              provinces_id: function(val, oldVal) {
                this.regencies_id = null;
                this.getRegenciesData();
              }
            }
        });

  </script>
@endpush