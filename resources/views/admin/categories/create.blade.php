@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create a new category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
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
