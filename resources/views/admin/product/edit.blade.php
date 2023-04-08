@extends('layouts.admin')


@section('main')
<style>
    form .card{
        margin: 20px auto;
    }
</style>

<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
     @csrf @method('PUT')
    <legend style="font-weight: bold;">Update sản phẩm</legend>
    <div class="card">
        <div class="container">
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Tên sản phẩm</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Tên sản phẩm">
                        @error('name')
                        <small style="color: red; font-style: italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Danh mục sản phẩm</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <select name="category_id" id="input" class="form-control" required="required">
                            <option value="">Chọn danh mục</option>
                            @foreach($cats as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Giá sản phẩm</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" class="form-control"  value="{{$product->price}}" name="price" placeholder="price" style="width: 50%;">
                        @error('price')
                        <small style="color: red; font-style: italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Giá khuyến mãi(nếu có)</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" class="form-control"  value="{{$product->sale_price}}" name="sale_price" placeholder="price"
                            style="width: 50%;">
                        @error('sale_price')
                        <small style="color: red; font-style: italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Trạng thái</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group form-inline">
                        <div class="radio">
                            <label style="margin-right: 20px;">
                                <input type="radio" name="status" value="1"  {{$product->status == 1 ? 'checked' : ''}} checked>
                                Hiển thị
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status"  {{$product->status == 0 ? 'checked' : ''}} value="0">
                                Tạm ẩn
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container">
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Ảnh sản phẩm</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="file" class="form-control" name="upload">
                        <img src="{{url('uploads')}}/{{$product->image}}" style="width:100%">
                        @error('upload')
                        <small style="color: red; font-style: italic">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="col-md-7">
            <button type="submit" class="btn btn-success" style="width: 87%;">Update</button>
        </div>
    </div>
</form>
@stop()