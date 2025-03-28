<!-- resources/views/customers/create.blade.php -->
@extends('layouts.app')

@section('content')
   <h1>Create Customer</h1>
   <form action="{{ route('customers.store') }}" method="POST">
       @csrf
       <div class="form-group">
           <label for="name">Name</label>
           <input type="text" name="name" id="name" class="form-control" required>
       </div>
       <div class="form-group">
           <label for="email">Email</label>
           <input type="email" name="email" id="email" class="form-control" required>
       </div>
       <div class="form-group">
           <label for="password">Password</label>
           <input type="password" name="password" id="password" class="form-control" required>
       </div>
       <button type="submit" class="btn btn-success mt-3">Create</button>
   </form>
   <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back</a>
   {{-- <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back</a> --}}
@endsection
