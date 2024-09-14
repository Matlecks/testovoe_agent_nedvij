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

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Цена</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['cost'] * $item['quantity'] }} ₽</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h2>Общая стоимость: {{ $totalPrice }} ₽</h2>
            <form action="{{ route('order.create') }}" method="POST">
                @csrf
                <button type="submit">Оформить заказ</button>
            </form>
        </div>
    </section>
@endsection
