@extends('layouts.admin')


@section('main')

<form action="{{route('category.add')}}" method="POST" role="form">
    <legend style="font-weight: bold;">Add Category</legend>
    @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
                @error('name')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group ">
                <label for="">trạng thái danh mục</label>

                <div class="form-inline ">
                    <div class="radio ">
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


    
        <button type="submit" class="btn btn-success" style="width: 100%;" >Submit</button>
    
</form>

@stop()