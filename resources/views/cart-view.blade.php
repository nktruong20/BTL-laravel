@extends('layouts.main')

@section('title','Giỏ hàng')
@section('main')

<!-- breadcrumb-area-start -->
<div class="breadcrumb__area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="index-2.html">Home</a></span>
                        <span class="dvdr">/</span>
                        <span>Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- cart area -->
<section class="cart-area pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('cart.updateAll')}}" method="post">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Courses</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $item)
                                <tr>
                                    <input type="hidden" name="id[]" value="{{$item->id}}">
                                    <td class="product-thumbnail">
                                        <a href="shop-details.html">
                                            <img src="{{url('uploads')}}/{{$item->image}}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="shop-details.html">{{$item->name}}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">${{$item->price}}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <span class="cart-minus">-</span>
                                        <input class="cart-input" type="text" name="quantity[]" value="{{$item->quantity}}">
                                        <span class="cart-plus">+</span>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">${{$item->price * $item->quantity}}</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="{{route('cart.delete', $item->id)}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Coupon code" type="text">
                                    <button class="tp-btn tp-color-btn banner-animation" name="apply_coupon"
                                        type="submit">Apply
                                        Coupon</button>
                                </div>
                                <div class="coupon2">
                                    <button class="tp-btn tp-color-btn banner-animation" name="update_cart"
                                        type="submit">Update cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-5 ">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Subtotal <span>${{$cart->totalPrice}}</span></li>
                                    <li>Total <span>${{$cart->totalPrice}}</span></li>
                                </ul>
                                <a href="checkout.html" class="tp-btn tp-color-btn banner-animation">Proceed to
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- cart area end-->
@stop()