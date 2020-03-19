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
        Subsidiary::create($request->all());
    	return redirect()->route('subsidiaries.index');
    }

    public function show(Subsidiary $subsidiary) {
        return view('subsidiary.show',['subsidiary'=>$subsidiary]);
    }

    public function index() {
        return view('subsidiary.index',['subsidiaries'=>Auth::user()->company->subsidiaries]);
    }

    public function edit(Subsidiary $subsidiary) {
        return view('subsidiary.edit',['subsidiary'=>$subsidiary]);
    }

    public function update(SubsidiaryUpdateRequest $request, Subsidiary $subsidiary) {
        $subsidiary->update($request->all());
        return redirect()->route('subsidiaries.index');
    }

    public function destroy (Subsidiary $subsidiary) {
        $subsidiary->delete();
        return redirect()->route('subsidiaries.index');
    }
}
