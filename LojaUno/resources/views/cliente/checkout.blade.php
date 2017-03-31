@extends('main')

@section('title', '| Checkout')

@section('content')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Total: R${{ $total }}</h4>
            {{-- <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
            </div> --}}
            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                <div class="row">
                    {{-- <div class="col-xs-12">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" class="form-control" required name="nome">
                        </div>
                    </div> --}}

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="endereco">Endereco</label>
                            <input type="text" id="endereco" class="form-control" required name="endereco">
                        </div>
                    </div>

                    <hr>
                    
                    {{-- <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Card Holder Name</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div> --}}

                    {{-- <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Credit Card Number</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div> --}}

                    {{-- <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-month">Expiration Month</label>
                                    <input type="text" id="card-expiry-month" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-year">Expiration Year</label>
                                    <input type="text" id="card-expiry-year" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div> --}}
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Compre agora!</button>
            </form>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection --}}