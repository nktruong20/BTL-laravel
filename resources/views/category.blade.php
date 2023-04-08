@extends('layouts.main')

@section('main')
<style>
.tpproduct img {
    width: 100%;
    height: 200px;
}
</style>
<!-- breadcrumb-area-start -->
<div class="breadcrumb__area grey-bg pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-breadcrumb__content">
                    <div class="tp-breadcrumb__list">
                        <span class="tp-breadcrumb__active"><a href="index-2.html">Home</a></span>
                        <span class="dvdr">/</span>
                        <span>{{$id->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area-end -->

<!-- shop-area-start -->
<section class="shop-area-start grey-bg pb-200">
    <div class="container">
        <div class="row">
        
            <div class="col-xl-10 col-lg-12 col-md-12">
                <div class="tpshop__top ml-60">
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
                            aria-labelledby="nav-popular-tab">
                            <div
                                class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
                                @foreach($products as $pro)
                                <div class="col">
                                    <div class="tpproduct p-relative mb-20">
                                        <div class="tpproduct__thumb p-relative text-center">
                                            <a href="{{route('home.detail', $pro->id)}}"><img
                                                    src="{{url('uploads')}}/{{$pro->image}}" alt=""></a>
                                            <a class="tpproduct__thumb-img"
                                                href="{{route('home.detail', $pro->id)}}"><img
                                                    src="{{url('uploads')}}/{{$pro->image}}" alt=""></a>
                                            <div class="tpproduct__info bage">
                                                @if((100%-(((($pro->sale_price)/($pro->price)))*100)) > 0)

                                                <span class="tpproduct__info-discount bage__discount">-
                                                    {{100%-(((($pro->sale_price)/($pro->price)))*100)}} % </span>
                                                <span class="tpproduct__info-hot bage__hot">HOT</span>
                                                @endif
                                            </div>
                                            <div class="tpproduct__shopping">
                                                <a class="tpproduct__shopping-wishlist" href="wishlist.html"><i
                                                        class="icon-heart icons"></i></a>
                                                <a class="tpproduct__shopping-wishlist" href="#"><i
                                                        class="icon-layers"></i></a>
                                                <a class="tpproduct__shopping-cart"
                                                    href="{{route('home.detail', $pro->id)}}"><i
                                                        class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="tpproduct__content">
                                            <span class="tpproduct__content-weight">
                                                <a href="">{{$id->name}}</a>,
                                            </span>
                                            <h4 class="tpproduct__title">
                                                <a href="{{route('home.detail', $pro->id)}}">{{$pro->name}}</a>
                                            </h4>

                                            <div class="tpproduct__price">
                                                <span>${{number_format($pro->sale_price)}}</span>
                                                <del>${{number_format($pro->price)}}</del>
                                            </div>
                                        </div>
                                        <div class="tpproduct__hover-text">
                                            <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                                                <a class="tp-btn-2" href="{{route('cart.add',$pro->id)}}" >Add to cart</a>
                                            </div>
                                            <div class="tpproduct__descrip">
                                                <ul>
                                                    <li>Type: Organic</li>
                                                    <li>MFG: August 4.2021</li>
                                                    <li>LIFE: 60 days</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="basic-pagination text-center mt-35">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-area-end -->
@stop()