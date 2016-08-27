<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Pages;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/admin');
    }

    public function addpage(){

        return view('admin/add_page');
    }

    public function savepage(Request $request)
    {
       // $fil = explode();
      var_dump($request->input("img"));
       // return redirect()->route('addPage')->with('status', $title);
    }
    public function getpage()
    {
        $page = DB::table('pages')->select('img_id')->get();

        $img_id = explode("|",$page[0]->img_id);

        $file = DB::table('laradrop_files')->whereIn('id', $img_id )->get();


      dd($file);
    }
}
