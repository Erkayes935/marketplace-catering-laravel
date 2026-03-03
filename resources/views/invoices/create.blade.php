@extends('layouts.app')

@section('content')
    <h1>Buat Invoice</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="order_id">Pilih Pesanan</label>
            <select name="order_id" id="order_id" class="form-control" required>
                <option value="">Pilih Pesanan</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" @selected(old('order_id') == $order->id)>
                        Order #{{ $order->id }} - {{ $order->customer->name }} - {{ $order->delivery_date }}
                    </option>
                @endforeach
            </select>
            @if ($orders->isEmpty())
                <small class="text-muted">Semua pesanan sudah punya invoice.</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success" @disabled($orders->isEmpty())>Generate Invoice</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
