@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create a new event</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data">
                                	@method('PUT')
                                    @csrf
                                    @include('inc.messages')
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input required name="name" type="text" value="{{ old('name') ?? $event->name }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date &amp; Time</label>
                                        <input required name="start_date" value="{{ old('start_date') ?? $event->start_date }}" type="text" class="form-control datetimepicker @error('start_date') is-invalid @enderror">
                                        @error('start_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>End Date &amp; Time</label>
                                        <input required name="end_date" value="{{ old('end_date') ?? $event->end_date }}" type="text" class="form-control datetimepicker @error('end_date') is-invalid @enderror">
                                        @error('end_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Event Description</label>
                                        <textarea required name="description" value="{{ old('description') }}" class="summernote-simple">
                                        	{{ $event->description }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                    	<div>
                                    		
                                    	</div>
                                        <div id="image-preview" class="image-preview">
                                        	<img src="{{ asset("$event->thumbnail") }}" alt="">
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
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
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
