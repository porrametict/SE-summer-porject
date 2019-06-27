<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Survey;
use App\User;
use App\Questions;
use DB;
class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $survey = Survey::all();
      return Response() -> json($survey);
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
    public function store(Request $request){

        $request->validate([
            'hSurvey' => 'required|max:255',
            'u_id' => 'required',
            'questions'=> 'required'
        ]);


       $survey = Survey::create([
         'name' => $request -> get('hSurvey'),
         'u_id' => $request -> get('u_id'),
         'status' => 1
       ]);

      $questions = ($request -> get('questions'));

      $n = 0;
      while ($n != count($questions)){
        Questions::create([
          'text' => $questions[$n]['text'],
          's_id' => $survey -> id
        ]);
        //$questions[$n]['text'];
        $n++;
      }

      return Response() -> json($survey);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $questions = Survey::find($id) -> questions;
        $survey = Survey::find($id);
        return Response() -> json(['survey' => $survey, 'questions' => $questions]);
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
        $survey = Survey::find($id);
        $survey->status =$request -> get('status') ;
        $survey->save();
        return Response() -> json($survey);

    }

    public function user_survey($id)
    {

      $users = DB::table('surveys')->where('u_id', '=', $id)->orderBy('created_at','desc')->paginate(5);
      return Response() -> json($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $survey = Survey::destroy($id);
      return Response() -> json($survey);
    }
}
