@extends('admin')
@section('main')
<div id="content">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách bài đăng</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="list-card-icon pd-50-t-b">
                <a href="{{route('tour_deatil_add')}}"> <div class="item-card-icon flex_center"><i class="fa-solid fa-plus"></i></div></a>
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
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th class="flex_center">Thao tác</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->tour_deatil_name}}</td>
                                <td>{{$item->tour_deatil_code}}</td>
                                <td>{{ number_format($item->category_tour_deatil_price, 0, '.', ',') }} VND</td>
                                <td>
                                    @if ($item->tourDeatil_status)
                                        Đang bật
                                    @else
                                        Đã ẩn
                                    @endif
                                 </td>
                                <td>
                                    <div class="flex_center" style="gap:10px">
                                        <a href="{{route('tour_deatil_deatil',['tourDeatil_id'=>$item->tour_deatil_id])}}">Xem</a>
                                        <a href="{{route('tour_deatil_update',['tourDeatil_id'=>$item->tour_deatil_id])}}">Sửa</a>
                                        @if ($item->tourDeatil_status===1)
                                            <a onclick="return confirm('Bạn có muốn ẩn không')" href="{{route('tour_deatil_toogle_status',['tourDeatil_id'=>$item->tour_deatil_id,'tourDeatil_status'=>1])}}">Ẩn</a>
                                        @else
                                            <a onclick="return confirm('Bạn có muốn hiện không')" href="{{route('tour_deatil_toogle_status',['tourDeatil_id'=>$item->tour_deatil_id,'tourDeatil_status'=>0])}}">Hiện</a>
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