@extends('admin')
@section('main')
    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Cập nhật tour chi tiết</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    @foreach ($deatil as $itemDeatil)
                        <div class="table-responsive">
                            <form class="row g-3 needs-validation"
                                action="{{ route('tour_deatil_post_update', ['tourDeatil_id' => $itemDeatil->tour_deatil_id]) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                @if ($errors->any())
                                    <div class="alert col-12 alert-danger text-center">
                                        <span>Có lỗi xảy ra vui lòng kiểm tra lại dữ liệu</span>
                                    </div>
                                @endif
                                @if (session('errorMessage'))
                                    <div class="col-12 alert alert-danger">
                                        {{ session('errorMessage') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <label class="form-label">Tên tour chi tiết</label>
                                    <input type="text" class="form-control tourNameDeatil" name="name"
                                        value="{{ $itemDeatil->tour_deatil_name }}" required>
                                    <div class="err-span"><span>

                                        </span></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mã tour chi tiết</label>
                                    <input type="text" class="form-control tourCodeDeatil" name="code"
                                        value="{{ $itemDeatil->tour_deatil_code }}" required>
                                    <div class="err-span"><span>
                                        </span></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Tên danh mục tour</label>
                                    <select class="form-select categoryTour" name="categoryTour" required>
                                        <option value="{{ $itemDeatil->tour_category_id }}">
                                            {{ $itemDeatil->category_tour_name }}</option>
                                        @foreach ($list as $item)
                                            @if ($itemDeatil->tour_category_id !== $item->category_tour_id)
                                                <option value="{{ $item->category_tour_id }}">
                                                    {{ $item->category_tour_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Giá</label>
                                    <input type="text" class="form-control priceTourDeatil" name="priceTourDeatil"
                                        value="{{ $itemDeatil->category_tour_deatil_price }}" required>
                                    <div class="err-span"><span>

                                        </span></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ngày bắt đầu</label>
                                    <input type="text" class="form-control flatpickr startTime " name="startTime"
                                        value="{{ $itemDeatil->tour_deatil_startTime }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ngày kết thúc</label>
                                    <input type="text" class="form-control flatpickr endTime" name="endTime"
                                        value="{{ $itemDeatil->tour_deatil_endTime }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ngày khởi hành</label>
                                    <input type="text" class="form-control flatpickr startTour" name="startTour"
                                        value="{{ $itemDeatil->tour_deatil_start }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phương tiện vận chuyển</label>
                                    <input type="text" class="form-control vehicleTourDeatil" name="vehicleTourDeatil"
                                        value="{{ $itemDeatil->tour_deatil_transport }}" required>
                                    <div class="err-span"><span>

                                        </span></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Địa điểm xuất phát</label>
                                    <input type="text" class="form-control locationStartDeatil"
                                        name="locationStartDeatil" value="{{ $itemDeatil->tour_deatil_localtion }}"
                                        required>
                                    <div class="err-span"><span>

                                        </span></div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Mô tả</label><br>
                                    <textarea id="mota" class="editor motaDeatil" name="mota" cols="30" rows="10">
                                {{ $itemDeatil->tour_deatil_infro }}    
                            </textarea>
                                    <div class="err-span"><span>

                                        </span></div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection
