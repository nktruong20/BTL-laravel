@extends('layouts.main')

@section('title','Liên hệ')
@section('main')

<!-- breadcrumb-area-start -->
<div class="tptrack__product mb-40">
                    <form action="" method="post">
                        @csrf
                        <div class="tptrack__content grey-bg">

                            <div class="tptrack__id mb-10">

                                <span><i class="fal fa-user"></i></span>
                                <input name="name" placeholder="Username / email address">
                            </div>
                            <div class="tptrack__id mb-10">

                                <span><i class="fal fa-user"></i></span>
                                <input type="email" name="email" placeholder="Username / email address">
                            </div>
                            <div class="tptrack__email mb-10">
                                <span><i class="fal fa-key"></i></span>
                                <input type="text"  name="subject" placeholder="subject">

                            </div>
                            <div class="tptrack__email mb-10">
                                <span><i class="fal fa-key"></i></span>
                                <textarea name="content" class="form-control" placeholder="content"></textarea>

                            </div>

                            <div class="tptrack__btn">
                                <button class="tptrack__submition active" type="submit">Send contact<i
                                        class="fal fa-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
<!-- location-area-end -->

<!-- cart area end-->
@stop()