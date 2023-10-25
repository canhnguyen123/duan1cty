<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\tourRequest;
use Illuminate\Support\Facades\File;
use App\Models\tourModel;
class tourController extends Controller
{
    public function list(){
        $tourModel = new tourModel();
        $list = $tourModel->getList();
        foreach ($list as $item) {
            if ($item->category_tour_rank !== 0) {
                $parentMenu = DB::table('tbl_category_tour')->where('category_tour_id', $item->category_tour_rank)->first();
                if ($parentMenu) {
                    $item->parentName = $parentMenu->category_tour_name;
                } else {
                    $item->parentName = "Cấp cha không tồn tại";
                }
            }
        }
        $i=1;
        return view('include.page.tour.list', compact('list','i'));
    }
    public function getLisTAPI()
{
    $tourModel = new tourModel();
    $list = $tourModel->getList();
         return response()->json([
        'status'=>'success',
        'result' => $list,
    ]);
}

    public function add(){
        $tourModel = new tourModel();
        $list = $tourModel->getList();
        return view('include.page.tour.add',compact('list'));

    }
    public function addPost(tourRequest $request){
        $tourModel = new tourModel();
        $name=$request->tourName;
        $code=$request->tourCode;
        $rank=$request->tourRank;
        $check=$tourModel->checkDatabase($code);
        if($check){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
        $add=$tourModel->addtour($name, $code,$rank);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('tour_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('tour_add')."';</script>";
        }
        
    }
    public function update($category_tour_id){
        $tourModel = new tourModel();
        $deatil = $tourModel->getDeatil($category_tour_id);
        foreach ($deatil as $item) {
            if ($item->category_tour_rank !== 0) {
                $parentMenu = DB::table('tbl_category_tour')->where('category_tour_id', $item->category_tour_rank)->first();
                if ($parentMenu) {
                    $item->parentName = $parentMenu->category_tour_name;
                } else {
                    $item->parentName = "Cấp cha không tồn tại";
                }
            }
        }
        $list = $tourModel->getList();
        return view('include.page.tour.update',compact('deatil','list'));

    }
    public function updatePost(tourRequest $request,$category_tour_id){
        $tourModel = new tourModel();
        $name=$request->tourName;
        $code=$request->tourCode;
        $rank=$request->tourRank;
        $check=$tourModel->checkDatabasesIs($code, $category_tour_id);
        if($check){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
        $update=$tourModel->upadtetour($name, $code, $rank,$category_tour_id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('tour_list')."';</script>";
        }else{
            return " <script> alert('Cập nhật thất bại'); window.location = '".route('tour_update',['tourDeatil_id'=>$category_tour_id])."';</script>";
        }
        
    }
    public function toogle_status($category_tour_id,$category_tour_status){
        $tourModel= new tourModel();
        $tour=$tourModel->getDeatilFrise($category_tour_id);
        $status=0;
        if($tour->category_tour_status==1){
            if($category_tour_status==0){
                $status=1;
            }else{
                $status=0;
            }
        }
         if ($tour->category_tour_status == 0) {
            if($category_tour_status==1){
                $status=0;
            }else{
                $status=1;
            }
        }
      
       $tourModel->status_toggle($status,$category_tour_id);
        return " <script> alert('Cập nhật thành công'); window.location = '".route('tour_list')."';</script>";
   }
}
