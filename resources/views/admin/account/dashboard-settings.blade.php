@extends('layouts.dashboard')

@section('title')
  Store Settings
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">
        Store Settings
      </h2>
      <p class="dashboard-subtitle">
        Make store that profitable
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Your Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Phone Number</label>
                      <input type="number" class="form-control" name="number_phone" value="{{ $user->number_phone }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Roles</label>
                      <input type="text" class="form-control" name="roles" value="{{ $user->roles }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Password User</label>
                          <input type="password" name="password" id="password" class="form-control">
                          <small>Kosongkan jika tidak ingin mengganti password</small> 
                      </div>
                  </div>
                  <div class="col-md-6">
                        <img src="{{ Storage::url($user->avatar) }}" class="card-img-top" style="max-width: 200px">
                        <div class="card-body">
                          <p class="card-text">{{ Auth::user()->name }}</p>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Avatar</label>
                      <input type="file" class="form-control" name="avatar">
                    </div>
                  </div>
                <div class="row">
                  <div class="col text-right">
                    <button type="submit" class="btn btn-success px-5 mt-4">Save Now</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection