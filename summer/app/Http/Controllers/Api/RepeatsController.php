<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repeats;
use App\Comment;
class RepeatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $repeats = Repeats::all();
      return Response() -> json($repeats);
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

      $questions = ($request -> get('ans'));

      $n = 0;
      while ($n != count($questions)){
        Repeats::create([
          'age' => $request -> get('age'),
          'sex' => $request -> get('sex'),
          'career' => $request -> get('career'),
          's_id' => $request -> get('s_id'),
          'province' => $request -> get('province'),
          'q_id' => $request -> get('ans')[$n]['q_id'],
          'rate' => $request -> get('ans')[$n]['rate']
        ]);
        $n++;
      }
      if($request->get('comment') != "")
      {
          Comment::create([
              's_id' => $request -> get('s_id'),
              'text' => $request -> get('comment'),
              'age' => $request -> get('age'),
              'sex' => $request -> get('sex'),
              'career' => $request -> get('career'),
              'province' => $request -> get('province'),
          ]);
      }


      return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $repeats = Repeats::find($id);
      return Response() -> json($repeats);
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
      $repeats = Repeats::destroy($id);
      return Response() -> json($repeats);
    }
}
