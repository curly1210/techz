<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/css/app.css")
</head>
<body>
    <div class="p-5 w-full">

        <h1 class="text-2xl font-bold ">Quản lý danh mục</h1>
        
        @session('status')
        <div class="message bg-green-200 p-3 mt-2 border-green-600 border-l-4">

        <p class="message text-green-700">{{session('status')}}</p>

    </div>
        @endsession
        <form action="{{url("admin/categories/search")}}" class="text-right mb-1" method="get" >
            {{-- @csrf --}}
            <input  class="mt-4 border-gray-200 border-2 p-1" type="text" placeholder="Tìm kiếm ..." name="name" value="{{isset($search)?$search:''}}">
            <button type="submit" class="bg-blue-500 text-white p-1 ">Tìm kiếm</button>
        </form>
        <table class="w-full">
            <thead class="bg-gray-50  ">
                <th class="p-3 text-sm font-semibold text-left">STT</th>
                <th class="p-3 text-sm font-semibold text-left">Tên danh mục</th>
                <th class="p-3 text-sm font-semibold text-left">Hành động</th>
            </thead>
            <tbody>
                @forelse ($categories as $index=>$category)
                    

                <tr class="bg-white border-t-2 border-gray-200">
                    <td class="p-3 text-sm text-gray-700">@php
                        echo $index+1
                    @endphp
                    </td>
                    <td class="p-3 text-sm text-gray-700">{{$category->name}}</td>
                    <td class="p-3 text-sm text-gray-700">
                        <form action="{{route("categories.destroy",$category->id)}}" onsubmit="return confirm('Bạn muốn xóa dữ liệu này ?')" method="post" style="display:inline-block" >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{route("categories.edit",$category->id)}}">Edit</a>
                    </td>
                </tr>
                    
                @empty
                <span>Không tìm thấy dữ liệu</span> 
                @endforelse 
          <tr ><td colspan="3"><a class="bg-blue-500 text-white p-2 rounded-lg mt-5 mb-3 text-center block" href="{{route('categories.create')}}">Thêm mới</a></td></tr>

            </tbody>
            <tfoot class="">
                <tr>
                    <td colspan="3">{{$categories->links()}}</td>
                </tr>
            </tfoot>
            
        </table>
              

    </div>
    
    
    
</body>
</html>