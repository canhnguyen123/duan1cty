@extends('admin')
@section('main')
<div id="content">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách bài đăng</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="list-card-icon pd-50-t-b">
                <a href="{{route('tour_add')}}"> <div class="item-card-icon flex_center"><i class="fa-solid fa-plus"></i></div></a>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Dữ liệu bảng</h6>
            </div>
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mã</th>
                                <th>Cấp cha</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->category_tour_name}}</td>
                                <td>{{$item->category_tour_code}}</td>
                                <td>
                                    @if ($item->category_tour_rank === 0)
                                        Không có cấp cha
                                    @else
                                        {{ $item->parentName }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->category_tour_status)
                                        Đang bật
                                    @else
                                        Đã ẩn
                                    @endif
                                 </td>
                                <td>
                                    <div class="flex_center" style="gap:10px">
                                        <a href="{{route('tour_update',['category_tour_id'=>$item->category_tour_id])}}">Sửa</a>
                                        @if ($item->category_tour_status)
                                            <a onclick="return confirm('Bạn có muốn ẩn không')" href="{{route('tour_toogle_status',['category_tour_id'=>$item->category_tour_id,'category_tour_status'=>1])}}">Ẩn</a>
                                        @else
                                            <a onclick="return confirm('Bạn có muốn ẩn không')" href="{{route('tour_toogle_status',['category_tour_id'=>$item->category_tour_id,'category_tour_status'=>0])}}">Hiện</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                           
                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection