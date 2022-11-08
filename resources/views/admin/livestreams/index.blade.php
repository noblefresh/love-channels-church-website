@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All LiveStreams</h4>
                            </div>
                            <div class="card-body">
                            	@include('inc.messages')
                                @if ($livestreams->count() > 0)
                                	<div class="table-responsive">
				                      <table class="table table-bordered table-md">
				                        <tr>
				                          <th>#</th>
				                          <th>Title</th>
				                          <th>Description</th>
				                          <th>Start Date</th>
				                          <th>End Date</th>
				                          <th>Video ID</th>
				                          <th>Created At</th>
				                          <th>Edit</th>
				                          <th>Delete</th>
				                        </tr>
				                        @php($i = 0)
				                        @foreach ($livestreams as $livestream)
				                        	<tr>
					                          <td>{{ ++$i }}</td>
					                          <td>{{ $livestream->title }}</td>
					                          <td>{{ substr(strip_tags($livestream->description), 0, 50) }}@if(strlen(strip_tags($livestream->description)) > 50)... @endif</td>
					                          <td>{{ date_format(date_create($livestream->start_date), 'D jS M, Y. H:i A') }}</td>
					                          <td>{{ date_format(date_create($livestream->end_date), 'D jS M, Y. H:i A') }}</td>
					                           <td>
					                            <iframe src="https://www.youtube.com/embed/{{ $livestream->video_id }}" height="150"></iframe>
					                          </td>
					                          <td>{{ date_format(date_create($livestream->created_at), 'D jS M, Y. H:i A') }}</td>
					                         
					                          <td>
					                          	<a href="{{ route('livestreams.edit', $livestream->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
					                          </td>
					                          <td>
					                          	<a href="#!" onclick="if( confirm('Are you sure you want to delete this record?')){
								                        event.preventDefault();
								                      document.getElementById('delete-form').submit();
								                    }" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</a>
								                    <form id="delete-form" action="{{ route('livestreams.destroy', $livestream->id) }}" method="POST" class="d-none">
							                          @csrf
							                          @method('DELETE')
							                      </form>
					                          </td>
					                        </tr>
				                        @endforeach

				                      </table>
				                      {{ $livestreams->links() }}
				                    </div>
				                @else
				                <div class="alert alert-danger">No record found</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
