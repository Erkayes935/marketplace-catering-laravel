@extends('layouts.app')

@section('content')
    <h1>Buat Pesanan Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Pilih Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="delivery_date">Tanggal Antar</label>
            <input type="date" name="delivery_date" id="delivery_date" class="form-control" value="{{ old('delivery_date') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="menu_id">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control" required>
                <option value="">Pilih Menu</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}" @selected(old('menu_id') == $menu->id)>
                        {{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Jumlah</label>
            <input type="number" min="1" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', 1) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Pesanan</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
