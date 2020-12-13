@extends('layouts.index')

@section('style')
   <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="container">
   <h3 align="center">Customers List</h3><br />
   <div align="center">
    <a href="{{ route('export_excel.export') }}" class="btn btn-success">Export to Excel</a>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <td>Customer ID </td>
      <td>Name</td>
      <td>Email</td>
      <td>DOB</td>
      <td>img</td>
     </tr>
     @foreach($user_data as $user)
     <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->DOB }}</td>
      <td>{{ $user->img }}</td>
     </tr>
     @endforeach
    </table>
   </div>
   
  </div>
  @endsection