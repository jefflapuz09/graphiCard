@extends('layouts.master')

@section('contents')

<div class="container" style="margin-top:100px;">
    <div class="col-sm-6 mx-auto">
        <div class="">
                <form action="{{ url('/SearchResult') }}" method="post">
                    <div class="input-group col-sm-12" >
                        {{csrf_field()}}
                        <input type="text" class="form-control"  id="inlineFormInputGroup" name="search" placeholder="Search">
                        <button type="submit" class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
                        
                    </div>
                </form>
        </div>
    </div>
    
        @if(session('data'))
            <div class="card mt-5">
                <div class="">
                        @foreach(Session::get('data') as $test)
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img class="m-3 img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="{{ asset($test->image) }}" alt="">
                                    </div>
                                    <div class="col-sm-9 mt-5">
                                        <div class="mx-auto" align="center">
                                             <p class="mt- 5lead">{{$test->item}}</p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('/prodDescription/'.$test->id.'/'.$test->typeId.'/'.$test->itemId) }}" class="btn btn-primary"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                    @if(session('data')->isEmpty())
                        <div class="mx-auto mt-1">
                            <p class="lead">The item you search for did not match any item.</p>
                        </div>
                    @endif
            </div>
        @endif
    
</div>
    
@endsection