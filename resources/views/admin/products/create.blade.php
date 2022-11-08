@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add new product</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('inc.messages')
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required name="name" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input required name="price" value="{{ old('price') }}" type="number" class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" id="" class="form-control selectric">
                                        	<option value="">Select Category</option>
                                        	@if ($categories->count() > 0)
                                        		@foreach ($categories as $category)
                                        			<option value="{{ $category->id }}">{{ $category->name }}</option>
                                        		@endforeach
                                        	@endif
                                        </select>
                                        @error('start_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea required name="description" value="{{ old('description') }}" class="summernote-simple"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Cover Image</label>
                                        <div id="image-preview" class="image-preview">
                                          <label for="image-upload" id="image-label">Choose File</label>
                                          <input required name="thumbnail" type="file" id="image-upload" />
                                          @error('cover_image')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                      
                                      <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Create</button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
