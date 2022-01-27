@extends('layouts.app')


@section('content')

    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Text</p>
                <h2>All <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row">
                @foreach($products as $key => $value)

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{$value->img}}" alt="{{$value->name}}">
                        </div>
                        <div class="card-body">
                            <h4 class="card-product__title">
                                <a href="#">{{$value->name}}</a>
                            </h4>
                            <p class="card-product__price">{{$value->price}} грн</p>

                            <a type="button" href="#" class="btn btn-warning me-3 p-l-auto">Купить</a>
                            <a type="button" href="#" class="btn btn-outline-dark">В 1 клик</a>

                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>

@endsection
