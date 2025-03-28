<!-- resources/views/customers/show.blade.php -->
@extends('layouts.app')
@section('content')
    <h1>Detail Customer</h1>
    <p><strong>Nama:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Password:</strong> {{ $customer->password }}</p>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back</a>
    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning mt-3">Edit</a>
    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Hapus</button>
    </form>
@endsection
