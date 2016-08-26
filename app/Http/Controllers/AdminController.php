<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        dd($request->all());
       // return redirect()->route('addPage')->with('status', $title);
    }
}
