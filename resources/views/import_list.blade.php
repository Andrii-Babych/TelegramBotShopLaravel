@extends('layouts.app')

@section('content')
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="row">

                @include('menu')

                <div class="card-header">Import</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('file.import') }}" method="POST">
                            @csrf
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Import</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
