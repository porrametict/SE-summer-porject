<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sex;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function edit()
    {
        $user=auth()->user();
        $user->sex;
        $user->province;
        $sexes=Sex::all();
        $province=DB::table('provinces')->get();
        return view('auth.edituser')
            ->with('user',$user)
            ->with('sexes',$sexes)
            ->with('provinces',$province);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $user=auth()->user();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'b_date'=>$request->b_date,
            'career'=>$request->career,
            'sex_id'=>$request->sex,
            'province_id'=>$request->province,
        ]);
        return redirect('/home');
    }

}
