@extends('layouts.headerFooter')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">All User List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Serial No.</th>
        <th>E-Mail</th>
        <th>Phone Number</th>
        <th>User Type</th>
        <th>Created On</th>
      </tr>
      </thead>
      <tbody>
      @foreach($userlist as $key => $value)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->phonenumber}}</td>
        @if($value->usertype == 1)
        <td>{{'Buyer'}}</td>
        @else
        <td>{{'Seller'}}</td>
        @endif
        <td>{{$value->created_at}}</td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>Serial No.</th>
        <th>E-Mail</th>
        <th>Phone Number</th>
        <th>User Type</th>
        <th>Created On</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection