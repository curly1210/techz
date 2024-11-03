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
        @session('status')
        <p class="message" style="color: rgb(75, 175, 75)">{{session('status')}}</p>
        @endsession
        <h1 class="text-center">Đây là trang Danh mục</h1>
        <table border="1" >
            <thead>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </thead>
            <tbody>
                @foreach ($categories as $index=>$category)
                <tr>
                    <td>@php
                        echo $index+1
                    @endphp
                    </td>
                    <td>{{$category->name}}</td>
                    <td>
                        <form action="{{route("categories.destroy",$category->id)}}" method="post" style="display:inline-block" >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{route("categories.edit",$category->id)}}">Edit</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
        <a href="{{route('categories.create')}}">Thêm mới</a>
    </div>
    
    
</body>
</html>