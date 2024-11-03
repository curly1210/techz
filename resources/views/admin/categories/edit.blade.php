<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="{{url('admin/categories')}}"> <-Trở về</a>
        <h1>Cập nhật danh mục</h1>
        <form action="{{route("categories.update",$category->id)}}"  method="POST">
            @method('PUT')
            <div>
            <label for="name">
                Tên danh mục
            </label>
            <input type="text" name="name" placeholder="Nhập tên danh mục" value="{{$category->name}}">
            </div>
            @csrf
            {{-- @if($error->any())
            <div>
                <ul>
                    @foreach ($error->all() as $error)
                       <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
            @endif --}}
            <button type="submit">Cập nhật</button>    
        </form>
    </div>
</body>
</html>