<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
        @csrf
       Product Name <input type="text" name="name"><br><br>
       Price <input type="number" name="price"><br><br>
       Color <input type="color" name="color"><br><br>
       Size <input type="text" name="size"><br><br>
       Brand <select name="brandid" id="">
           @foreach($brands as $b)
                    <option value="{{$b->id}}">{{$b->name}}</option>
           @endforeach
           
       </select>
       <br><br>
       Category <select name="categoryid" id="">
        @foreach($categories as $b)
                 <option value="{{$b->id}}">{{$b->name}}</option>
        @endforeach
        
    </select>
    file <input type="file" multiple name="images[]">
        <input type="submit">
    </form>
</body>
</html>