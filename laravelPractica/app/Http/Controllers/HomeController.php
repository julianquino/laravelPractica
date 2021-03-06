<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use Auth;
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
        return view('admin');
        /*if(Auth::User()->company_id){
            return view('admin');
            return redirect()->route('companies.show',['company'=>Auth::user()->company_id]);
        }
        return view('home');*/
    }
    public function show(){
        return view('admin');
    }
}
