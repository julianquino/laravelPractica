<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
class CompanyController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Company::class, 'company');
    }

    public function create() {
    	return view('company.register');
    }

    public function store(CompanyStoreRequest $request) {
        $company = Company::create($request->all());
        $company->owner_id = Auth::user()->id;
        if($request->file('logo')) {
            $path = Storage::disk('public')->put('logos',$request->file('logo'));
            $company->logo = $path;
        }
        $company->save();
        Auth::user()->update(['company_id'=>$company->id]);
    	return $company;
    }

    public function show(Company $company) {
        return $company;
        //return view('company.show',['company'=>$company]);
    }

    public function edit(Company $company) {
        return view('company.edit',['company'=>$company]);
    }

    public function update(CompanyUpdateRequest $request,Company $company) {
        if($request->file('logo')) {
            Storage::disk('public')->delete($company->logo);
            $path = Storage::disk('public')->put('logos',$request->file('logo'));
            $company->logo = $path;
            $company->save();
        }
        $company->update($request->all());
        return $company;
    }

    public function getCompany(){
        return Company::findOrFail(Auth::user()->company->id);
    }
    public function index(){
        return 'no permitido';
    }

    public function destroy() {
        return 'no permitido';
    }


}
