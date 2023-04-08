@extends('layouts.admin')
@section('main')
<form action="" method="GET" class="form-inline" role="form">
<legend style="font-weight: bold;">All Product</legend>

    <div class="form-group">
        <input name="keyword" class="form-control" style="width:200px" placeholder="Input keyword">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('product.create')}}" class="btn btn-success pull-right" style="width: 200px;">Add Product</a>
</form>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price/ Sale</th>
            <th>Status</th>
            <th>Image</th>
            <th class="text-center">Setting</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->cat->name }}</td>
            <td>{{ $product->price }}/ {{ $product->sale_price }}</td>
            <td>{{ $product->status == 0 ? 'Tạm ẩn' : 'Hiển thị' }}</td>
            <td>
                <img src="{{url('uploads')}}/{{$product->image}}" width="60">
            </td>
            <td class="text-right">
                <form action="{{route('product.delete', $product->id)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary"><i
                            class="fa fa-edit"></i></a>
                    <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')"><i
                            class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
</table>
<hr>
{{$products->appends(request()->all())->links()}}
@stop()