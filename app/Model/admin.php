<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
 // insert data model
    public function insertdata($table,$data){
        $data = DB::table($table)->insert($data);
        return $data;
    }
    //get all date
    public function GetallData($table){
        $data = DB::table($table)->orderBy('id','DESC')->get();
        return $data;
    }
    //remove item
    public function RemoveItem($table,$id){
        $data = DB::table($table)->where('id',$id)->delete();
        return $data;
    }
    //Edit item
    public function EditeItem($table,$id){
        $data = DB::table($table)->where('id',$id)->first();
        return $data;
    }

    public function UpdateItem($table,$id,$data){
       $data =  DB::table($table)->where('id',$id)->update($data);
       return $data;
    }

}
