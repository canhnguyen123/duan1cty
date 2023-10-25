<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\tourRequest;
use Illuminate\Support\Facades\File;
use App\Models\serviceModel;
class serviceController extends Controller
{
    public function list(){
        $serviceModel = new serviceModel();
        $list = $serviceModel->getList();
        $i=1;
        return view('include.page.tour.list', compact('list','i'));
    }
    public function getLisTAPI()
{
    $serviceModel = new serviceModel();
    $list = $serviceModel->getList();
         return response()->json([
        'status'=>'success',
        'result' => $list,
    ]);
}

    public function add(){
        $serviceModel = new serviceModel();
        $list = $serviceModel->getList();
        return view('include.page.tour.add',compact('list'));

    }
    public function addPost(tourRequest $request){
        $serviceModel = new serviceModel();
        $name=$request->tourName;
        $code=$request->tourCode;
        $rank=$request->tourRank;
        $check=$serviceModel->checkDatabase($code);
        if($check){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
        $add=$serviceModel->addtour($name, $code,$rank);
        if($add){
            return " <script> alert('Thêm thành công'); window.location = '".route('tour_list')."';</script>";
        }else{
            return " <script> alert('Thêm thất bại'); window.location = '".route('tour_add')."';</script>";
        }
        
    }
    public function update($service_id){
        $serviceModel = new serviceModel();
        $deatil = $serviceModel->getDeatil($service_id);
        foreach ($deatil as $item) {
            if ($item->service_rank !== 0) {
                $parentMenu = DB::table('tbl_service')->where('service_id', $item->service_rank)->first();
                if ($parentMenu) {
                    $item->parentName = $parentMenu->service_name;
                } else {
                    $item->parentName = "Cấp cha không tồn tại";
                }
            }
        }
        $list = $serviceModel->getList();
        return view('include.page.tour.update',compact('deatil','list'));

    }
    public function updatePost(tourRequest $request,$service_id){
        $serviceModel = new serviceModel();
        $name=$request->tourName;
        $code=$request->tourCode;
        $rank=$request->tourRank;
        $check=$serviceModel->checkDatabasesIs($code, $service_id);
        if($check){
            $errorMessage = "Mã danh mục đã tồn tại";
            session()->flash('errorMessage', $errorMessage);
            return redirect()->back();
        }
        $update=$serviceModel->upadtetour($name, $code, $rank,$service_id);
        if($update){
            return " <script> alert('Cập nhật thành công'); window.location = '".route('tour_list')."';</script>";
        }else{
            return " <script> alert('Cập nhật thất bại'); window.location = '".route('tour_update',['tourDeatil_id'=>$service_id])."';</script>";
        }
        
    }
    public function toogle_status($service_id,$service_status){
        $serviceModel= new serviceModel();
        $tour=$serviceModel->getDeatilFrise($service_id);
        $status=0;
        if($tour->service_status==1){
            if($service_status==0){
                $status=1;
            }else{
                $status=0;
            }
        }
         if ($tour->service_status == 0) {
            if($service_status==1){
                $status=0;
            }else{
                $status=1;
            }
        }
      
       $serviceModel->status_toggle($status,$service_id);
        return " <script> alert('Cập nhật thành công'); window.location = '".route('tour_list')."';</script>";
   }
}
