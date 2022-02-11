<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('product.add')}}">Add New Product</a>
    <table border="1" width="50%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Color</th>
            <th>Size</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach($products as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->price}}</td>
            <td><div style="width: 100%;height:20px;background-color:{{$c->color}}"></div></td>
            <td>{{$c->size}}</td>
            <td>{{$c->categoryname}}</td>
            <td>{{$c->brandname}}</td>
            <td>
                {{ \Carbon\Carbon::parse($c->created_at)->diffForhumans() }}
                </td>
            <td>
                <a href="{{route('product.delete',$c->id)}}">Delete</a> | 
                <a href="{{route('product.update',$c->id)}}">Update</a> | 
                <a href="{{route('product.update',$c->id)}}">View</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>