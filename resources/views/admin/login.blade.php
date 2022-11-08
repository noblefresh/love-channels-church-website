@extends('layouts.front')
@section('content')
 <div class="page-top">
    <div class="parallax" style="background:url({{ asset('front/images/parallax1.jpg') }});"></div>	
    <div class="container"> 
        <h1>ADMIN <span>LOGIN</span></h1>
        <ul>
            <li><a href="/" title="">Home</a></li>
            <li><a href="#!" title="">Admin Login</a></li>
        </ul>
    </div>
</div><!--- PAGE TOP -->

        <section>
            <div class="block remove-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title2">
                                
                            </div>

                            <div class="row">
                                
                                <div class="col-md-6 offset-md-2 ">
                                    <h4>ENTER YOUR CREDENTIALS TO LOGIN</h4>
                                    <div class="space"></div>
                                    
                                    <form class="theme-form" method="post" action="{{ route('submit.admin.login') }}">
                                    	@csrf
                                        @include('inc.messages')
                                        <input required name="email" class="form-control" value="{{ old('email') }}" type="email" id="email" placeholder="Email" />
                                        @error('email')
							                <span class="invalid-feedback text-danger" role="alert">
							                    <strong>{{ $message }}</strong>
							                </span>
							            @enderror
                                        <input required name="password" class="form-control" type="password"  placeholder="Password" />
                                        
                                        <input class="submit" type="submit"  value="SUBMIT" />
                                    </form><!--- FORM -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>	

       
@endsection