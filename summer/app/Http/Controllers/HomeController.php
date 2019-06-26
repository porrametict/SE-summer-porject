<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sex;
use DB;
use Hash;
use mysql_xdevapi\Session;


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
        $user=auth()->user();

        //dd($request->all());
        $old_pass= $request->old_password;
        $new_pass=$request->password;
        $current_pass = $user->password;

        if($new_pass != ""){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'old_password' => ['required', 'string', 'min:8']
            ]);

            if (Hash::check($old_pass, $current_pass)) {
                // dd("TURE");
                $user->update([
                    "password"=> Hash::make($new_pass)
                ]);

            }else{
                Session()->flash('error','wrong password');
                return redirect(route('user_edit'));
            }


        }






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
