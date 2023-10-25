<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tourModel extends Model
{
    protected $table = 'tbl_category_tour'; // Tên bảng mà model này liên kết với
    protected $primaryKey = 'category_tour_id'; // Tên cột khóa chính của bảng
    public $timestamps = false; // Không sử dụng các trường created_at và updated_at

    public function getList()
    {
        $result = DB::table($this->table)->get();
        return $result;
    }
    public function getDeatil($category_tour_id)
    {
        $result = DB::table($this->table)->where($this->primaryKey,$category_tour_id)->get();
        return $result;
    }
    public function getDeatilFrise($category_tour_id)
    {
        $result = DB::table($this->table)->where($this->primaryKey,$category_tour_id)->first();
        return $result;
    }
    public function addtour($name, $code, $rank)
    {
        $data = [
            'category_tour_name' => $name,
            'category_tour_code' => $code,
            'category_tour_rank' => $rank,
            'category_tour_status' => 1,
        ];

        try {
            $result = DB::table($this->table)->insert($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function upadtetour($name, $code, $rank,$id)
    {
        $data = [
            'category_tour_name' => $name,
            'category_tour_code' => $code,
            'category_tour_rank' => $rank,
        ];

        try {
            $result = DB::table($this->table)->where($this->primaryKey,$id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
    public function checkDatabase($code)
    {
        return DB::table($this->table)
            ->Where('category_tour_code', $code)
            ->exists();
    }
    public function checkDatabaseIs($code, $id)
    {
        return DB::table($this->table)
            ->where('category_tour_code', $code)
            ->where($this->primaryKey, '<>', $id)
            ->exists();
    }
    public function status_toggle($status, $id)
    {
        $data['category_tour_status'] = $status;
        try {
            $result =   DB::table($this->table)->where($this->primaryKey, $id)->update($data);
            return $result; // Trả về true nếu thành công, false nếu thất bại
        } catch (\Exception $e) {
            return false;
        }
    }
}
