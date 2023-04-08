@extends('layouts.admin')


@section('main')

<form action="{{route('category.update',$cat->id)}}" method="POST" role="form">
    <legend style="font-weight: bold;">Upadte Category</legend>
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control"  value="{{$cat->name}}" name="name" placeholder="Tên danh mục">
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
                            <input type="radio" name="status" value="1" {{$cat->status == 1 ? 'checked' : ''}} checked>
                            Hiển thị
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" {{$cat->status == 0 ? 'checked' : ''}} value="0">
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