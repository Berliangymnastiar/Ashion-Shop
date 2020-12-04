@extends('layouts.auth')

@section('title')
    Registration Page
@endsection

@section('content')
<div class="page-content page-auth mt-5" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center row-login">
          <div class="col-lg-6 text-center">
            <img src="/img/login-image.png" alt="" class="w-50 mb-4 mb-lg-none">
          </div>
          <div class="col-lg-5">
            <h2>Register and get interesting items at the Ashion Shop!<br>
            </h2>
            <form method="POST" action="{{ route('register') }}" class="mt-3">
              @csrf
              <div class="form-group">
                <label for="">Fullname</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror w-75" name="name" v-model="name" required autocomplete="name" autofocus>
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Email Address</label>
                <input id="email" v-model="email" @change="checkForEmailAvailability()" type="email" class="form-control w-75 @error('email') is-invalid @enderror" name="email" :class="{ 'is-invalid' : this.email_unavailable }" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Your numberphone</label>
                <input id="number_phone" v-model="number_phone" type="number" class="form-control w-75 @error('number_phone') is-invalid @enderror" name="number_phone" required autocomplete="number_phone">

                @error('number_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror w-75" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control w-75" name="password_confirmation" required autocomplete="new-password">
              </div>

              <button href="{{ route('register') }}" class="btn btn-success btn-block w-75 mt-2" :disabled="this.email_unavailable">
                Sign Up
              </button>
              <a href="{{ route('login') }}" class="btn btn-signup btn-block w-75 mt-4">
                Sign in page
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.min.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: '#register',
            mounted() {
                AOS.init();
            }, 
            methods: {
                checkForEmailAvailability: function() {
                    var self = this;
                    axios.get('{{ route('api-register-check') }}' , {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email available! Please continue to the next step!", {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000    
                                }
                            )
                            self.email_unavailable = false
                        } else {
                            self.$toasted.error(
                                "Sorry, email has already registered in our system", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000
                                }
                            )
                           self.email_unavailable = true
                        }

                        //Handle success
                        console.log(response);
                    });
                }
            },
            data() {
                return {
                    name: "Berlian Gymnastiar",
                    email: "Yourgans@gmail.com",
                    email_unavailable: false,
                }
            }
        })
    </script>
@endpush

{{-- <div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

