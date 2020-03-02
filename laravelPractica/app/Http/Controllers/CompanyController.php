<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Company::class, 'company');
    }

    public function create() {
    	return view('company.register');
    }

    public function store(Request $request) {
        $company = company::create($request->all());
        if($request->file('logo')) {
            $path = Storage::disk('public')->put('logos',$request->file('logo'));
            $company->fill(['logo'=> asset($path)])->save();
        }
        Auth::user()->update(['company_id'=>Company::where('owner_id', Auth::user()->id)->firstOrFail()->id]);
    	return redirect()->route('companies.show',['company'=>Auth::user()->company->id]);
    }

    public function show(Company $company) {
        return view('company.show',['company'=>$company]);
    }

    public function edit(Company $company) {
        return view('company.edit',['company'=>$company]);
    }

    public function update(Request $request,Company $company) {
        if($request->file('logo')) {
            $path = Storage::disk('public')->put('logos',$request->file('logo'));
            $company->logo = asset($path);
            $company->save();
        }
        $company->update($request->all());
        return redirect()->route('companies.show',['company'=>$company->id]);
    }
    public function index(){
        //no permitido
        return redirect()->route('companies.show',['company'=>Auth::user()->company_id]);
    }

    public function destroy() {
        return 'no permitido';
    }


}
