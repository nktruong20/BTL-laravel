<!-- product-area-start -->
<style>
* {
    font-family: Arial, Helvetica, sans-serif;
}

.product img {
    width: 100%;
    height: 150px;
}

.product {
    background-color: var(--tp-common-white);
}

.col .tpproduct img{
    width: 100%;
    height: 200px;
}
.product span {
    font-size: 15px;
    color: black;
}

.feature h6 {
    font-size: 13px;
}
</style>
<div class="container">
    <h4 class="text-left" style="color:#ca7300;font-weight: 600;">{{$title}}</h4>
    <hr>
    <div class="tab-pane fade show active whight-product" id="nav-popular" role="tabpanel"
        aria-labelledby="nav-popular-tab">
        <div
            class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-4 row-cols-sm-2 row-cols-1 tpproduct__shop-item">
            @foreach($products as $pro)
            <div class="col">
                <div class="tpproduct p-relative mb-20">
                    <div class="tpproduct__thumb p-relative text-center">
                        <a href="{{route('home.detail', $pro->id)}}"><img
                                src="{{url('uploads')}}/{{$pro->image}}" alt=""></a>
                        <a class="tpproduct__thumb-img" href="{{route('home.detail', $pro->id)}}"><img
                                src="{{url('uploads')}}/{{$pro->image}}" alt=""></a>
                        <div class="tpproduct__info bage">
                            @if((100%-(((($pro->sale_price)/($pro->price)))*100)) > 0)
                            <span class="tpproduct__info-discount bage__discount"> - {{100%-(((($pro->sale_price)/($pro->price)))*100)}} % </span>
                            <span class="tpproduct__info-hot bage__hot">HOT</span>
                            @endif
                        </div>
                        <div class="tpproduct__shopping">
                            <a class="tpproduct__shopping-wishlist" href="wishlist.html"><i
                                    class="icon-heart icons"></i></a>
                            <a class="tpproduct__shopping-wishlist" href="#"><i class="icon-layers"></i></a>
                            <a class="tpproduct__shopping-cart" href="{{route('home.detail', $pro->id)}}"><i
                                    class="icon-eye"></i></a>
                        </div>
                    </div>
                    <div class="tpproduct__content">
                        <span class="tpproduct__content-weight">
                            <a href="">{{$pro->name}}</a>
                        </span>
                        <h4 class="tpproduct__title">
                            <a href="{{route('home.detail', $pro->id)}}">{{$pro->name}}</a>
                        </h4>

                        <span class="badge badge-pill badge-success text-light "
                            style="font-size:10px ;"></span>

                        <div class="tpproduct__price">
                            <span>{{number_format($pro->sale_price)}} <span style="font-size: 15px;">VNĐ</span></span>
                            <del>{{number_format($pro->price)}}</del>
                        </div>
                    </div>
                    <div class="tpproduct__hover-text">
                        <div class="tpproduct__hover-btn d-flex justify-content-center mb-10">
                            <a class="tp-btn-2" href="{{route('cart.add',$pro->id)}}">Add to cart</a>
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

<!-- product-area-end -->