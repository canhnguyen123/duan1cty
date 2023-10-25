<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class tourDeatilModel extends Model
{
    protected $table = 'tbl_tour_deatil'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'tour_deatil_id'; // Tên cột khóa chính của bảng

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
        public function getDeatil($tour_deatil_id)
        {
            $result=DB::table('tbl_tour_deatil')
            ->join('tbl_category_tour',"tbl_tour_deatil.tour_category_id","=","tbl_category_tour.category_tour_id")
            ->where('tbl_tour_deatil.tour_deatil_id', $tour_deatil_id)
            ->select("tbl_tour_deatil.*", "tbl_category_tour.category_tour_name")
            ->get();
            return $result;
        }
    public function getDeatilFrise($tour_deatil_id)
    {
        $result = DB::table($this->table)->where($this->primaryKey,$tour_deatil_id)->first();
        return $result;
    }
    public function addtourDeatil($location,$tour_id,$price,$name, $code,$startTime,$endTime,$startTimeTour,$transport,$infro,$listImg)
    {
        $data = [
            'tour_category_id' => $tour_id,
            'category_tour_deatil_price' => $price,
            'tour_deatil_code' => $code,
            'tour_deatil_name' => $name,
            'tour_deatil_localtion' => $location,
            'tour_deatil_start' => $startTimeTour,
            'tour_deatil_startTime' => $startTime,
            'tour_deatil_endTime' => $endTime,
            'tour_deatil_transport' => $transport,
            'tour_deatil_infro' => $infro,
            'tourDeatil_status' => 1,
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now(),
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
                'tour_deatil_id'=>$id,
                'tour_deatil_img_link' => $item,
                'tour_deatil_img_status' => 1,
           ];
           try {
            $result = DB::table('tbl_tour_deatil__img')->insert($data);
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
            'category_tour_deatil_price' => $price,
            'tour_deatil_code' => $code,
            'tour_deatil_name' => $name,
            'tour_deatil_localtion' => $location,
            'tour_deatil_start' => $startTimeTour,
            'tour_deatil_startTime' => $startTime,
            'tour_deatil_endTime' => $endTime,
            'tour_deatil_transport' => $transport,
            'tour_deatil_infro' => $infro,
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
            ->Where('tour_deatil_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $id)
    {
        return DB::table($this->table)
            ->where('tour_deatil_code', $code)
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
