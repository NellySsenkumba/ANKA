@extends('Layouts.layout')
@section('content')



<div class="content-wrapper">
    <div class="border-top my-3">
        <div class="p-3 mb-2 bg-dark text-white">

            <section class="container content-section">
                <h2 class="section-header">PRODUCTS</h2>
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">

                    </span>
                    <span class="cart-price cart-header cart-column">PRICE</span>
                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>

                </div>
                <div class="cart-items">
                    @foreach ($products as $pdt)
                        
                    
                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <span class="cart-item-title">
                                <h5>{{ $pdt->name }}</h5>
                                <Br>
                                <p>{{$pdt->description}}</p>
                            </span>
                        </div>
                        <span class="cart-price cart-column">${{ $pdt->price }}</span>
                        <div class="cart-quantity cart-column">
                            <input class="cart-quantity-input" type="number" value="0">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <span class="cart-total-price">$0</span>
                </div>
                <button class="btn btn-primary btn-purchase" type="button">BOOK NOW</button>
            </section>


        </div>
    </div>
</div>

@endsection
