@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Categories</h4>
                            </div>
                            <div class="card-body">
                            	@include('inc.messages')
                                @if ($categories->count() > 0)
                                	<div class="table-responsive">
				                      <table class="table table-bordered table-md">
				                        <tr>
				                          <th>#</th>
				                          <th>Name</th>
				                          <th>Created At</th>
				                          <th>Edit</th>
				                          <th>Delete</th>
				                        </tr>
				                        @php($i = 0)
				                        @foreach ($categories as $category)
				                        	<tr>
					                          <td>{{ ++$i }}</td>
					                          <td>{{ $category->name }}</td>
					                          
					                          <td>
					                            {{ date_format(date_create($category->created_at), 'D jS M, Y. H:i A') }}
					                          </td>
					                          <td>
					                          	<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
					                          </td>
					                          <td>
					                          	<a href="#!" onclick="if( confirm('Are you sure you want to delete this record?')){
								                        event.preventDefault();
								                      document.getElementById('delete-form').submit();
								                    }" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</a>
								                    <form id="delete-form" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-none">
							                          @csrf
							                          @method('DELETE')
							                      </form>
					                          </td>
					                        </tr>
				                        @endforeach

				                      </table>
				                      {{ $categories->links() }}
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
