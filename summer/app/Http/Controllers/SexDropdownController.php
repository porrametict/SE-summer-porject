<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sex;

class SexDropdownController extends Controller
{
    function index () {
        $data=Sex::all();
        $result=array();
        $output='<option value="">เลือกเพศ</option>';
        foreach ($data as $row) {
            $output.='<option value="'.$row->id.'">'.$row->text.'</option>';
        }
        echo $output;

    }
}
