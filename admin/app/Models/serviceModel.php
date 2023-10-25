<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class serviceModel extends Model
{
    protected $table = 'tbl_service'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'service_id'; // Tên cột khóa chính của bảng

    public function getList()
    {
        $result = DB::table($this->table)->get();
        return $result;
    }
    public function getListTour()
    {
        $result = DB::table('tbl_category_tour')->get();
        return $result;
    }
        public function getDeatil($service_id)
        {
            $result=DB::table('tbl_service')
            ->join('tbl_category_tour',"tbl_service.tour_category_id","=","tbl_category_tour.category_tour_id")
            ->where('tbl_service.service_id', $service_id)
            ->select("tbl_service.*", "tbl_category_tour.category_tour_name")
            ->get();
            return $result;
        }
    public function getDeatilFrise($service_id)
    {
        $result = DB::table($this->table)->where($this->primaryKey,$service_id)->first();
        return $result;
    }
    public function addtourDeatil($location,$tour_id,$price,$name, $code,$startTime,$endTime,$startTimeTour,$transport,$infro,$listImg)
    {
        $data = [
            'tour_category_id' => $tour_id,
            'category_service_price' => $price,
            'service_code' => $code,
            'service_name' => $name,
            'service_localtion' => $location,
            'service_start' => $startTimeTour,
            'service_startTime' => $startTime,
            'service_endTime' => $endTime,
            'service_transport' => $transport,
            'service_infro' => $infro,
            'tourDeatil_status' => 1,
            // 'created_at' =>  Carbon::now(),
            // 'updated_at' =>  Carbon::now(),
        ];

        try {
            $result = DB::table($this->table)->insertGetId($data);
            if($result){
                $this->addImg($listImg,$result);
            }
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function addImg($listImg,$id){
        foreach($listImg as $item){
            $data = [
                'service_id'=>$id,
                'service_img_link' => $item,
                'service_img_status' => 1,
           ];
           try {
            $result = DB::table('tbl_service__img')->insert($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
        }
       

       
    }
    public function updatetourDeatil($location,$tour_id,$price,$name, $code,$startTime,$endTime,$startTimeTour,$transport,$infro,$tourDeatil_id)
    {
        $data = [
            'tour_category_id' => $tour_id,
            'category_service_price' => $price,
            'service_code' => $code,
            'service_name' => $name,
            'service_localtion' => $location,
            'service_start' => $startTimeTour,
            'service_startTime' => $startTime,
            'service_endTime' => $endTime,
            'service_transport' => $transport,
            'service_infro' => $infro,
        ];

        try {
            $result = DB::table($this->table)->where($this->primaryKey,$tourDeatil_id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('service_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $id)
    {
        return DB::table($this->table)
            ->where('service_code', $code)
            ->where($this->primaryKey, '<>', $id)
            ->exists();
    }
    public function status_toggle($status, $id)
    {
        $data['tourDeatil_status'] = $status;
        try {
            $result =   DB::table($this->table)->where($this->primaryKey, $id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
