<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('product.update',$product->id)}}" method="post">
        @csrf
       Product Name <input type="text" name="name" value="{{$product->name}}"><br><br>
       Price <input type="number" name="price" value="{{$product->price}}"><br><br>
       Color <input type="color" name="color" value="{{$product->color}}"><br><br>
       Size <input type="text" name="size" value="{{$product->size}}"><br><br>
       Brand <select name="brandid" id="">
           @foreach($brands as $b)
           @if($b->id==$product->brandid)
                    <option value="{{$b->id}}" selected>{{$b->name}}</option>
            @else 
            <option value="{{$b->id}}" selected>{{$b->name}}</option>
                    @endif
           @endforeach
           
       </select>
       <br><br>
       Category <select name="categoryid" id="">
        @foreach($categories as $b)
        @if($b->id==$product->categoryid)
        <option value="{{$b->id}}" selected>{{$b->name}}</option>
        @else 
        <option value="{{$b->id}}" selected>{{$b->name}}</option>
                @endif       
        @endforeach
        
    </select>
        <input type="submit">
    </form>
</body>
</html>