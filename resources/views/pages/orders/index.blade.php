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
                        <th>Номер заказа</th>
                        <th>Дата заказа</th>
                        <th>Товары</th>
                        <th>Общая стоимость</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->product_names }}</td>
                            <td>{{ $order->total_price }} ₽</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h2>Итоговая стоимость всех заказов: {{ $totalOrdersPrice }} ₽</h2>
        </div>
    </section>
@endsection
