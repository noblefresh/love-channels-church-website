@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit {{ $liveStream->title }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('livestreams.update', $liveStream->id) }}" method="post" enctype="multipart/form-data">
                                	@method('PUT')
                                    @csrf
                                    @include('inc.messages')
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input required name="title" type="text" value="{{ old('title') ?? $liveStream->title }}" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date &amp; Time</label>
                                        <input required name="start_date" value="{{ old('start_date') ?? $liveStream->start_date }}" type="text" class="form-control datetimepicker @error('start_date') is-invalid @enderror">
                                        @error('start_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>End Date &amp; Time</label>
                                        <input required name="end_date" value="{{ old('end_date') ?? $liveStream->end_date }}" type="text" class="form-control datetimepicker @error('end_date') is-invalid @enderror">
                                        @error('end_date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea required name="description" class="summernote-simple">{{ old('description') ?? $liveStream->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube Video ID</label>
                                        <input required name="video_id" type="text" value="{{ old('video_id') ?? $liveStream->video_id }}" placeholder="l8mubjl5cGk" class="form-control @error('video_id') is-invalid @enderror">
                                        <small>E.g: https://www.youtube.com/watch?v=l8mubjl5cGk <strong>(Video ID = l8mubjl5cGk)</strong></small>
                                        @error('video_id')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
