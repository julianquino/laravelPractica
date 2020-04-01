<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsidiary;
use App;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\SubsidiaryStoreRequest;
use App\Http\Requests\SubsidiaryUpdateRequest;

class SubsidiaryController extends Controller {

    public function __construct() {
        $this->authorizeResource(Subsidiary::class, 'subsidiary');
    }
    
    public function create() {
    	return view('subsidiary.register');
    }

    public function store(SubsidiaryStoreRequest $request) {
        $subsidiary = new Subsidiary;
        $subsidiary->name = $request->name;
        $subsidiary->address = $request->address;
        $subsidiary->company_id = Auth::user()->company_id;
        $subsidiary->creator_id = Auth::user()->id;
        $subsidiary->save();
        return $subsidiary;
    }

    public function show(Subsidiary $subsidiary) {
        return view('subsidiary.show',['subsidiary'=>$subsidiary]);
    }

    public function index() {
        return Auth::user()->company->subsidiaries;
    }

    public function edit(Subsidiary $subsidiary) {
        return view('subsidiary.edit',['subsidiary'=>$subsidiary]);
    }

    public function update(SubsidiaryUpdateRequest $request, Subsidiary $subsidiary) {
        $subsidiary->update($request->all());
        return $subsidiary;
    }

    public function destroy (Subsidiary $subsidiary) {
        $subsidiary->delete();
    }
}
