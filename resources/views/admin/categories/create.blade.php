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
        <h1>Thêm danh mục</h1>
        <form action="{{route('categories.store')}}" method="POST">
            <div>
            <label for="name">
                Tên danh mục
            </label>
            <input type="text" name="name" placeholder="Nhập tên danh mục">
            </div>
            @csrf
            @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="submit">Thêm</button>    
        </form>
    </div>
</body>
</html>