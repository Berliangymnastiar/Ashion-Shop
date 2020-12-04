@extends('layouts.dashboard')

@section('title')
    Edit Page Product
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">
        Edit Product
    </h2>
    <p class="dashboard-subtitle">
        Edit Our Product
    </p>
    </div>
    <div class="dashboard-content">
<div class="row">
<div class="col-md-12">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
<div class="card-body">
    <form action="{{ route('product.update', $items->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name Product</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $items->name }}" required> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ $items->author }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Category Product</label>
                    <select name="categories_id" class="form-control">
                        <option value="{{ $items->categories_id }}">{{ $items->category->name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach    
                    </select> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $items->price }}" required> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="editor">{!! $items->description !!}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <button type="submit" class="btn btn-success px-5">
                    Save Now
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush