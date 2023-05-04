@extends('layouts.main')

@section('main')
<style>
.introduce img {
    width: 100%;
    border-radius: 50%;
    border: red;
    background-color: #FFFFFF;
    height: 100px;
    -moz-border-radius: 75px;
    -webkit-border-radius: 75px;
    width: 100px;
    margin: 10px auto;
    text-align: center;
}
</style>
<div class="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="https://noithatsanvuon.com/images/2022/03/02/dua-vao-dau-de-danh-gia-do-uy-tin-cua-shop-ban-do-noi-that.jpg"
                    alt="Third slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="http://noithatdogo.dichvuwordpress.com/wp-content/uploads/2019/07/slider1.jpg"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                    src="http://noithatdogo.dichvuwordpress.com/wp-content/uploads/2019/07/slider2.jpg"
                    alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- category-area-start -->
<div class="container introduce">
    <div class="row mt-4 mb-4">
        <div class="col-md-3">
            <div class="all card px-1">
                <div class="img" style="margin: 0 auto ;">
                    <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_1024,h_640/https://www.essentialhome.eu/blog/wp-content/uploads/2021/02/20-Furniture-Shops-Showrooms-In-Singapore_1-1024x640.jpg"
                        alt="" width="100%">
                </div>
                <div class="content text-center mb-4">
                    <h5 style="color: #bd771c;">Showroom hoành tráng</h5>
                    <span class="mx-2 my-5" style="font-size: 15px;">Showroom Nội thất trưng bày sản phẩm nội thất thời
                        thượng, đẳng cấp với hàng ngàn sản phẩm mới.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="all card px-1">
                <div class="img" style="margin: 0 auto ;">
                    <img src="http://noithatdogo.dichvuwordpress.com/wp-content/uploads/2019/07/2-1-min.jpg"
                        alt="" width="100%">
                </div>
                <div class="content text-center mb-4">
                    <h5 style="color: #bd771c;">Nhà máy sản xuất</h5>
                    <span class="mx-2 my-5" style="font-size: 15px;">Quy mô nhà máy rộng hàng nghìn m² trực tiếp sản xuất các sản phẩm nội thất cho các dự án lớn.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="all card px-1">
                <div class="img" style="margin: 0 auto ;">
                    <img src="http://noithatdogo.dichvuwordpress.com/wp-content/uploads/2019/07/3-1-min.jpg"
                        alt="" width="100%">
                </div>
                <div class="content text-center mb-4">
                    <h5 style="color: #bd771c;">Thiết kế và thi công</h5>
                    <span class="mx-2 my-5" style="font-size: 15px;">Thiết kế nội thất gia đình, khách sạn sang trọng, hiện đại, bắt nhịp xu hướng mới trên thế giới.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="all card px-1">
                <div class="img" style="margin: 0 auto ;">
                    <img src="http://noithatdogo.dichvuwordpress.com/wp-content/uploads/2019/07/4-2-min.jpg"
                        alt="" width="100%">
                </div>
                <div class="content text-center mb-4">
                    <h5 style="color: #bd771c;">Dịch vụ chuyên nghiệp</h5>
                    <span class="mx-2 my-5" style="font-size: 15px;">Tư vấn nhiệt tình, bảo trì chuyên nghiệp sẽ khiến mọi khách hàng hài lòng về chúng tôi</span>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- category-area-end -->
<x-product title="Nội thất phòng khách" :products="$livingProduct" />
<x-product title="Nội thất phòng ngủ" :products="$bedProduct" />
<x-product title="Nội thất phòng làm bếp" :products="$kitProduct" />
<x-product title="Nội thất phòng làm việc" :products="$workProduct" />






@stop()