@extends('layouts.app')

@section('content')
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="row">

             @include('menu')

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12 col-lg-12">

                        <form class="row" method="POST" action="{{ route('admin.update') }}" id="contactForm">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <textarea class="form-control different-control w-100" name="message"
                                                      id="message"
                                                      cols="30" rows="5" placeholder="Enter Message">{{$message}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
