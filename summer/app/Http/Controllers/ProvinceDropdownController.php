<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProvinceDropdownController extends Controller
{
    function index () {
        $data=DB::table('provinces')->get();
        $result=array();
        $output='<option value="" disabled selected>เลือกจังหวัด</option>';
        foreach ($data as $row) {
            $output.='<option value="'.$row->id.'">'.$row->name_th.'</option>';
        }
        echo $output;

    }
}
