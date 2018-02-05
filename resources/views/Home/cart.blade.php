@extends('layouts.master')

@section('contents')
    <div class="container" style="margin-top:100px;">
        <form action="{{ url('/customer/cart/checkout') }}" method="post">
            {{ csrf_field() }}
        <div class="card bg-faded">
                <table class="table">
                        <thead>
                          <tr class="bg-dark text-white">
                            <th>Product</th>
                            <th>Specification</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($post as $posts)
                            <tr>
                                <td>{{$posts->name}}
                                </td>
                                <td>
                                    <li>{{$posts->options->attributeName}}</li>
                                    <li>{{$posts->options->choice}}</li>
                                    <li>{{$posts->options->description}}</li> 
                                </td>
                                <td><input type="number" value="{{$posts->qty}}" style="width:100px"/></td>
                                <td><?php $ans = $posts->qty * $posts->price; $ans2 = $ans + $posts->options->base_price * $posts->qty?>{{number_format($ans2,2)}}</td>
                                <td>
                                    <a href="{{ url('/customer/cart/'.$posts->rowId.'/remove') }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove from cart">
                                        <i class="fa fa-close" aria-hidden="true"></i>
                                    </a>
                                </td>
                            <tr>
                          @endforeach
                        </tbody>
                 </table>
        </div>
                <div class="col-sm-12">
                    <div class="pull-right">
                        @if(Auth::guest())
                        <span style="color:red;">You need to be sign-in first in order for you to checkout.</span>
                        <a href="#" style="pointer-events:none; opacity:0.75" data-toggle="modal" disabled data-target="#modal" class="btn btn-primary">Proceed to Checkout</a>
                        @else 
                        <a href="#" data-toggle="modal" data-target="#modal" class="btn btn-primary">Proceed to Checkout</a>
                        @endif
                    </div>
                </div>
        {{--  Hidden Fields  --}}
        
        @foreach($post as $post2)
        @if(Auth::guest())

        @else
        <input type="hidden" value="{{Auth::user()->Customer->id}}" name="customerId">
        <input type="hidden" value="{{$post2->options->attributeName}}:{{$posts->options->choice}}" name="spec">
        <input type="hidden" value="{{$post2->options->description}}" name="description[]"> 
        <input type="hidden" value="{{$post2->qty}}" name="qty[]"> 
        <input type="hidden" value="{{$post2->name}}" name="item[]"> 
        <input type="hidden" value="{{$ans2}}" name="price"> 
        @endif

        @endforeach
        {{--  modal  --}}
        <div class="modal fade" id="modal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-white" style="background:darkred;">
                      <h5 class="modal-title">Cart Content</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <hr class="colorgraph">
                      <h1>Order Inclusion</h1>
                      @if(Auth::guest())
                      
                      @else 
                      Customer Name:  {{Auth::user()->Customer->firstName}} {{Auth::user()->Customer->middleName}} {{Auth::user()->Customer->lastName}}<Br><br>
                      @endif
                      Product(/s): <br>
                      @foreach($post as $item)
                        {{$item->name}} ({{$item->qty}}) <br>
                        {{$item->options->attributeName}} {{$item->options->choice}} <br>
                        Job Order: {{$item->options->description}} <br><br>
                      @endforeach

                      <div class="form-group">
                        Remarks:
                        <textarea class="form-control" required rows="5" id="jobDesc" placeholder="Type your job description here. Such as what date do you need it?" name="remarks"></textarea>
                        </div>

                        <span style="color:red;">Note:</span><br>Price may vary depending on the customer's request.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>   
                    </div>
                  </div>
                </div>
              </div>
        {{--  endofmodal  --}}
            </form>
    </div>
@endsection