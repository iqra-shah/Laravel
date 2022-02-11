<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('category.add')}}">Add New Category</a>
    <table border="1" width="50%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach($categories as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->created_at}}</td>
            <td>
                <a href="{{route('category.delete',$c->id)}}">Delete</a> | 
                <a href="{{route('category.update',$c->id)}}">Update</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>