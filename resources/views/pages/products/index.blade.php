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

            <div class="button_group d-flex justify-content-end mb-4">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('product.create') }}" class="btn btn-outline-success">Создать товар</a>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Выбрать количество для покупки</th>
                        <th scope="col">Создан</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->cost }}</td>
                            <td>{{ $product->count }}</td>
                            <td class="change_count">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" value="1" min="1">
                                    <button type="submit">Добавить в корзину</button>
                                </form>
                            </td>

                            <td>{{ $product->created_at }}</td>
                            <td>
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="backgroud:none; border:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6C757DFF"
                                        class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                                        </path>
                                    </svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('product.edit', $id = $product->id) }}">Изменить</a></li>
                                    <li>
                                        <form action="{{ route('product.destroy', $id = $product->id) }}" method="POST"
                                            class="dropdown-item">
                                            @csrf
                                            <button type="submit"
                                                style="border:none; background: none; padding: 0px;">Удалить</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection