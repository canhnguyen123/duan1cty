@extends('admin')
@section('main')
<div id="content">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm mới tour chi tiết</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <form class="row g-3 needs-validation" >
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
                          <label  class="form-label">Tên tour chi tiết</label>
                          <input type="text" class="form-control tourNameDeatil"   required>
                          <div class="err-span"><span>  
                               
                          </span></div>
                        </div>
                        <div class="col-md-6">
                          <label  class="form-label">Mã tour chi tiết</label>
                          <input type="text" class="form-control tourCodeDeatil"   required>
                          <div class="err-span"><span>  
                           </span></div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Tên danh mục tour</label>
                            <select class="form-select categoryTour"  required>
                              @foreach ($list as $item)
                                 <option value="{{$item->category_tour_id}}">{{$item->category_tour_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Giá</label>
                            <input type="text" class="form-control priceTourDeatil"   required>
                            <div class="err-span"><span>  
                                 
                            </span></div>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Ngày bắt đầu</label>
                            <input type="text" class="form-control flatpickr startTime " name="tourName"  required>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Ngày kết thúc</label>
                            <input type="text" class="form-control flatpickr endTime"  required>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Ngày khởi hành</label>
                            <input type="text" class="form-control flatpickr startTour" required>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Phương tiện vận chuyển</label>
                            <input type="text" class="form-control vehicleTourDeatil" required>
                            <div class="err-span"><span>  
                                 
                            </span></div>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Địa điểm xuất phát</label>
                            <input type="text" class="form-control locationStartDeatil" name="tourName"  required>
                            <div class="err-span"><span>  
                                 
                            </span></div>
                          </div>
                          <div class="col-md-6">
                            <label  class="form-label">Upload ảnh</label>
                            <input type="file" class="form-control" id="file-upload-tour-deatil" name="tourName" multiple  required>
                            <div class="err-span"><span>  
                                 
                            </span></div>
                          </div>
                          <div class="col-md-12">
                            <label  class="form-label">Mô tả</label><br>
                            <textarea  id="mota" class="editor motaDeatil" cols="30" rows="10"> </textarea>
                            <div class="err-span"><span>  
                                 
                            </span></div>
                          </div>
                        <div class="col-12">
                          <button class="btn btn-primary" id="btn-add-tour-deatil" type="submit">Thêm</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection