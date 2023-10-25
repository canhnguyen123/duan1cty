@extends('admin')
@section('main')
    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> Cập nhật tour</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        @foreach ($deatil as $itemDeatil)
                            <form class="row g-3 needs-validation"
                                action="{{ route('tour_post_update', ['category_tour_id' => $itemDeatil->category_tour_id]) }}"
                                method="POST" novalidate>
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
                                    <label for="validationCustom01" class="form-label">Tên danh mục Tour</label>
                                    <input type="text" class="form-control" name="tourName"
                                        value="{{ $itemDeatil->category_tour_name }}" required>
                                    <div class="valid-feedback"><span></span></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Mã danh mục Tour</label>
                                    <input type="text" class="form-control" name="tourCode"
                                        value="{{ $itemDeatil->category_tour_code }}" required>
                                    <div class="valid-feedback"><span></span></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Cấp</label>
                                    <select class="form-select" name="tourRank" required>

                                        @if ($itemDeatil->category_tour_rank !== 0)
                                            <option value="{{ $itemDeatil->category_tour_rank }}">
                                                {{ $itemDeatil->parentName }}
                                            </option>
                                        @endif
                                        @if ($itemDeatil->category_tour_rank == 0)
                                            <option value="0">Không có cấp nào</option>
                                            </option>
                                        @endif
                                        @foreach ($list as $item)
                                            @if ($itemDeatil->category_tour_rank !== $item->category_tour_id)
                                                <option value="{{ $item->category_tour_id }}">
                                                    {{ $item->category_tour_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                </div>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
