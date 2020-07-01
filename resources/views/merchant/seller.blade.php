@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Seller Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif
                    You are logged in!
                    <div>
                      <img src="{{ asset('uploads/profileImage/'.$seller->image) }}" 
                      alt="{{ asset('uploads/profileImage/noImage.jpg') }}" 
                      width="300" height="120">
                    </div>
                      <h1>{{ $seller->first_name.' '.$seller->last_name  }}</h1>
                    <div>
                      {{$seller->created_at}}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
