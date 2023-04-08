@extends('layouts.admin')


@section('main')
<form action="{{route('product.add')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <legend style="font-weight: bold;">Thêm mới sản phẩm</legend>
    <div class="card">
        <div class="container">
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <label for="">Tên sản phẩm</label>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
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
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
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
                        <input type="text" class="form-control" name="price" placeholder="price" style="width: 50%;">
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
                        <input type="text" class="form-control" name="sale_price" placeholder="price"
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
                                <input type="radio" name="status" value="1" checked>
                                Hiển thị
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="0">
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
            <button type="submit" class="btn btn-success" style="width: 87%;">Thêm mới</button>
        </div>
    </div>
</form>



@stop()