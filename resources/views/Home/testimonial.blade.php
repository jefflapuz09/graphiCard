@extends('layouts.master')

@section('contents')

<div class="container" style="margin-top:80px;">
        <div class="row">
                @if(count($feed)!=0)
                @foreach($feed as $feedback)
                <div class="col-lg-3 mb-4">
                  <div class="card card-01">
          
                    <div class="profile-box">
                      <h3 class="text-center mb-5" style="color:darkorange;"></h3>
                    {{--  loob ng h3 header  --}}
                      <img class="card-img-top rounded-circle" src="{{ asset($feedback->image) }}" alt="Card image cap">
                    </div>
                    <div class="card-body text-center">
                      <span class="badge-box"><i class="fa fa-user"></i></span>
                      <h4 class="card-title">{{$feedback->name}}</h4>
                      <p class="card-text">{{$feedback->description}}</p>
                      <span class="social-box">
                        @for($i = 0; $i < $feedback->rating; $i++)
                          <span class="fa fa-star checked"></span>
                        @endfor            
                      </span>
                    </div>
                  </div>
          
          
                </div>
                @endforeach
                @else 
                <div class="col-lg-3 mb-4">
                    <div class="card card-01">
            
                      <div class="profile-box">
                        <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
                      {{--  loob ng h3 header  --}}
                        <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
                      </div>
                      <div class="card-body text-center">
                        <span class="badge-box"><i class="fa fa-user"></i></span>
                        <h4 class="card-title">Customer Name</h4>
                        <p class="card-text">Customer Description</p>
                        <span class="social-box">
                  
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                                 
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-4">
                      <div class="card card-01">
              
                        <div class="profile-box">
                          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
                        {{--  loob ng h3 header  --}}
                          <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                          <span class="badge-box"><i class="fa fa-user"></i></span>
                          <h4 class="card-title">Customer Name</h4>
                          <p class="card-text">Customer Description</p>
                          <span class="social-box">
                    
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                                   
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="card card-01">
                
                          <div class="profile-box">
                            <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
                          {{--  loob ng h3 header  --}}
                            <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
                          </div>
                          <div class="card-body text-center">
                            <span class="badge-box"><i class="fa fa-user"></i></span>
                            <h4 class="card-title">Customer Name</h4>
                            <p class="card-text">Customer Description</p>
                            <span class="social-box">
                      
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                     
                            </span>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 mb-4">
                            <div class="card card-01">
                    
                              <div class="profile-box">
                                <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
                              {{--  loob ng h3 header  --}}
                                <img class="card-img-top rounded-circle" src="{{ asset('img/steve.jpg') }}" alt="Card image cap">
                              </div>
                              <div class="card-body text-center">
                                <span class="badge-box"><i class="fa fa-user"></i></span>
                                <h4 class="card-title">Customer Name</h4>
                                <p class="card-text">Customer Description</p>
                                <span class="social-box">
                          
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                         
                                </span>
                              </div>
                            </div>
                          </div>
                @endif
          
              
            </div>

</div>
    
@endsection