@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="menu col-2">
            <a href="{{ route('product.index') }}"
                class="menu_point shadow-sm bg-white rounded p-3 text-decoration-none d-block">Товары</a>
            <a href="{{ route('cart.show') }}"
                class="menu_point shadow-sm bg-white rounded p-3 text-decoration-none d-block">Корзина</a>
                <a href="{{ route('orders.index') }}"
                class="menu_point shadow-sm bg-white rounded p-3 text-decoration-none d-block">Заказы</a>

        </div>
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">
            <form action="{{ route('product.update', $id = $product->id) }}" method="POST">
                @csrf
                <label class="w-100 mb-3" for="">ID : {{ $product->id }}</label>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                        value="{{ $product->title }}" name="title">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Цена</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                        value="{{ $product->cost }}" name="cost">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Количество</span>
                    <input type="text" class="form-control" aria-label="" aria-describedby="inputGroup-sizing-default"
                        value="{{ $product->count }}" name="count">
                </div>


                <button type="submit" class="btn btn-outline-success mt-5">Сохранить</button>
            </form>
        </div>
    </section>
@endsection
