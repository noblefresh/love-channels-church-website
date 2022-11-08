@extends('layouts.back')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
                            </div>
                            <div class="card-body">
                            	@include('inc.messages')
                                @if ($products->count() > 0)
                                	<div class="table-responsive">
				                      <table class="table table-bordered table-md">
				                        <tr>
				                          <th>#</th>
				                          <th>Name</th>
				                          <th>Description</th>
				                          <th>Price</th>
				                          <th>Category</th>
				                          <th>Cover Image</th>
				                          <th>Created At</th>
				                          <th>Edit</th>
				                          <th>Delete</th>
				                        </tr>
				                        @php($i = 0)
				                        @foreach ($products as $product)
				                        	<tr>
					                          <td>{{ ++$i }}</td>
					                          <td>{{ $product->name }}</td>
					                          <td>
					                          	{{ substr(strip_tags($product->description), 0, 50) }}@if(strlen(strip_tags($product->description)) > 50)... @endif
					                          </td>
					                          <td>
					                          	&#8358;{{ number_format($product->price, 2) }}
					                          </td>
					                         <td>
					                         	{{ $product->category->name }}
					                         </td>
					                         <td>
					                            <img width="150" src="{{ asset("$product->thumbnail") }}" alt="">
					                          </td>
					                          <td>{{ date_format(date_create($product->created_at), 'D jS M, Y. H:i A') }}</td>
					                          
					                          <td>
					                          	<a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
					                          </td>
					                          <td>
					                          	<a href="#!" onclick="if( confirm('Are you sure you want to delete this record?')){
								                        event.preventDefault();
								                      document.getElementById('delete-form').submit();
								                    }" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</a>
								                    <form id="delete-form" action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-none">
							                          @csrf
							                          @method('DELETE')
							                      </form>
					                          </td>
					                        </tr>
				                        @endforeach

				                      </table>
				                      {{ $products->links() }}
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
