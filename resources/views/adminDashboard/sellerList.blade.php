@extends('layouts.headerFooter')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">All Seller List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Serial No.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Profile Image</th>
        <th>Created On</th>
      </tr>
      </thead>
      <tbody>
      @foreach($sellerlist as $key => $value)  
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$value->first_name}}</td>
        <td>{{$value->last_name}}</td>
        <td><img src="{{ asset('uploads/profileImage/'.$value->image) }}" 
          alt="{{ asset('uploads/profileImage/noImage.jpg') }}" width="100" height="30">
        </td>
        <td>{{$value->created_at}}</td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>Serial No.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Profile Image</th>
        <th>Created On</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection