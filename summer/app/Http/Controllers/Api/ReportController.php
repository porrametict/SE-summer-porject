<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Survey;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $age = $request -> get('age');
        $sex = $request -> get('sex');
        $province = $request -> get('province');
        $career = $request -> get('career');

        $s_id =  $id; //$request -> get('s_id');

        $array = [];

        $a1 = ['s_id', '=', $s_id];

        $query = array([$a1]);

        array_push($array, $query);

        $p1 = ['age', '=', $age];

        $p2 = ['sex', '=', $sex];

        $p3 = ['province', '=', $province];

        $p4 = ['career', '=', $career];

        if ($age != ''){
            array_push($array, $p1);
        }

        if ($sex != ''){
            array_push($array, $p2);
        }

        if ($province != ''){
            array_push($array, $p3);
        }

        if ($career != ''){
            array_push($array, $p4);
        }

//        $users = DB::table('repeats')
//            ->where('s_id', $s_id)->get();

//        $users = DB::table('repeats')->where([
//            ['s_id', '=', $s_id],
//            ['age', '=', $age],
//        ])->get();

        $users = DB::table('repeats')
            ->select(DB::raw(' COUNT(id) count_n,rate,q_id'))
            ->where([$query])->groupBy('rate','q_id')->get();
        //dd($s_id);
        $survey = Survey::find($s_id);
        $question = DB::table('questions')->where('s_id',$s_id)->get();
        $comments = DB::table('comments')->where('s_id',$s_id)->get();


        return response() -> json(['survey' => $survey, 'question' => $question,'repeats' => $users , 'comments' => $comments ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
