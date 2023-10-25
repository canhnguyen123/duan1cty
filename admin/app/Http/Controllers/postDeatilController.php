<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\tourDeatilRequest;
use Illuminate\Support\Facades\File;
use App\Models\tourDeatilModel;

class postDeatilController extends Controller
{
    public function list(){
        $tourDeatilModel = new tourDeatilModel();
        $list = $tourDeatilModel->getList();
        $i=1;
        return view('include.page.tourDeatil.list', compact('list','i'));
    }
    
    public function add(){
        $tourDeatilModel = new tourDeatilModel();
        $list = $tourDeatilModel->getListTour();
        return view('include.page.tourDeatil.add',compact('list'));

    }
    public function addPost(Request $request){
        $tourDeatilModel = new tourDeatilModel();
        $name=$request->name;
        $code=$request->code;
        $tour_id=$request->category_tour;
        $price=$request->price;
        $startTime=$request->startTime;
        $endTime=$request->endTime;
        $startTimeTour=$request->startTour;
        $transport=$request->vehicle;
        $location=$request->location;
        $infro=$request->mota;
        $listImg=$request->listImg;
        $check=$tourDeatilModel->checkDatabase($code);
        if($check){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
        $add=$tourDeatilModel->addtourDeatil($location,$tour_id,$price,$name, $code,$startTime,$endTime,$startTimeTour,$transport,$infro,$listImg);
        if($add){
            return response()->json(['status' => 'success', 'mess' => 'Thêm thành công', 
            'route' => route('tour_deatil_list')
        ]);
        }else{
            return response()->json(['status' => 'fail', 'mess' => 'Thêm thất bại',  'route' => route('tour_deatil_add')]);
        }
        
    }
    public function update($category_tourDeatil_id){
        $tourDeatilModel = new tourDeatilModel();
        $list = $tourDeatilModel->getListTour();
        $deatil = $tourDeatilModel->getDeatil($category_tourDeatil_id);
        return view('include.page.tourDeatil.update',compact('deatil','list'));

    }
    public function updatePost(Request $request,$tourDeatil_id){
        $tourDeatilModel = new tourDeatilModel();
        $name=$request->name;
        $code=$request->code;
        $tour_id=$request->categoryTour;
        $price=$request->priceTourDeatil;
        $startTime=$request->startTime;
        $endTime=$request->endTime;
        $startTimeTour=$request->startTour;
        $transport=$request->vehicleTourDeatil;
        $location=$request->locationStartDeatil;
        $infro=$request->mota;
        $check=$tourDeatilModel->checkDatabaseIs($code,$tourDeatil_id);
        if($check){
            $errorMessage = "Mã tour đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
        $update=$tourDeatilModel->updatetourDeatil($location,$tour_id,$price,$name, $code,$startTime,$endTime,$startTimeTour,$transport,$infro,$tourDeatil_id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('tour_deatil_list')."';</script>";
        }else{
            return " <script> alert('Cập nhật thất bại'); window.location = '".route('tour_deatil_update',['tourDeatil_id'=>$tourDeatil_id])."';</script>";
        }
        
    }
    public function toogle_status($tourDeatil_id,$tourDeatil_status){
        $tourDeatilModel= new tourDeatilModel();
        $tourDeatil = $tourDeatilModel->getDeatilFrise($tourDeatil_id);
        $status = 0;
        if ($tourDeatil->tourDeatil_status == 1) {
            if ($tourDeatil_status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if ($tourDeatil->tourDeatil_status == 0) {
            if ($tourDeatil_status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        
        $tourDeatilModel->status_toggle($status, $tourDeatil_id);
        return " <script> alert('Cập nhật thành công'); window.location = '".route('tour_deatil_list')."';</script>";
   }
}
