@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create a new sermon</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sermons.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('inc.messages')
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input required name="title" type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Minister Name</label>
                                        <input required name="minister_name" type="text" value="{{ old('minister_name') }}" class="form-control @error('minister_name') is-invalid @enderror">
                                        @error('minister_name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sermon Description</label>
                                        <textarea required name="description" value="{{ old('description') }}" class="summernote-simple"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Cover Image</label>
                                        <div id="image-preview" class="image-preview">
                                          <label for="image-upload" id="image-label">Choose File</label>
                                          <input required name="cover_image" type="file" id="image-upload" />
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
