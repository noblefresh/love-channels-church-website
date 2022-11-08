@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Events</h4>
                            </div>
                            <div class="card-body">
                            	@include('inc.messages')
                                @if ($events->count() > 0)
                                	<div class="table-responsive">
				                      <table class="table table-bordered table-md">
				                        <tr>
				                          <th>#</th>
				                          <th>Name</th>
				                          <th>Description</th>
				                          <th>Start Date</th>
				                          <th>End Date</th>
				                          <th>Created At</th>
				                          <th>Cover Image</th>
				                          <th>Edit</th>
				                          <th>Delete</th>
				                        </tr>
				                        @php($i = 0)
				                        @foreach ($events as $event)
				                        	<tr>
					                          <td>{{ ++$i }}</td>
					                          <td>{{ $event->name }}</td>
					                          <td>{{ substr(strip_tags($event->description), 0, 50) }}@if(strlen(strip_tags($event->description)) > 50)... @endif</td>
					                          <td>{{ date_format(date_create($event->start_date), 'D jS M, Y. H:i A') }}</td>
					                          <td>{{ date_format(date_create($event->end_date), 'D jS M, Y. H:i A') }}</td>
					                          <td>{{ date_format(date_create($event->created_at), 'D jS M, Y. H:i A') }}</td>
					                          <td>
					                            <img width="150" src="{{ asset("$event->thumbnail") }}" alt="">
					                          </td>
					                          <td>
					                          	<a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
					                          </td>
					                          <td>
					                          	<a href="#!" onclick="if( confirm('Are you sure you want to delete this record?')){
								                        event.preventDefault();
								                      document.getElementById('delete-form').submit();
								                    }" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</a>
								                    <form id="delete-form" action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-none">
							                          @csrf
							                          @method('DELETE')
							                      </form>
					                          </td>
					                        </tr>
				                        @endforeach

				                      </table>
				                      {{ $events->links() }}
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
