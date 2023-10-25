@extends('admin')
@section('main')
<div id="content">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm mới tour</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <form class="row g-3 needs-validation" action="{{route('tour_post_add')}}" method="POST" novalidate>
                        @csrf
                        @if ($errors->any())
                        <div class="alert col-12 alert-danger text-center">
                          <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                      </div>
                  @endif
                  @if(session('errorMessage'))
                      <div class="col-12 alert alert-danger">
                          {{ session('errorMessage') }}
                      </div>
                  @endif
                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Tên danh mục Tour</label>
                          <input type="text" class="form-control" name="tourName"  required>
                          <div class="valid-feedback"><span></span></div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom02" class="form-label">Mã danh mục Tour</label>
                          <input type="text" class="form-control" name="tourCode"  required>
                          <div class="valid-feedback"><span></span></div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Cấp</label>
                            <select class="form-select" name="tourRank" required>
                              <option value="0">Không có cấp nào</option>
                              @foreach ($list as $item)
                                 <option value="{{$item->category_tour_id}}">{{$item->category_tour_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Thêm</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


