<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsidiary;
use App;
use Auth;
use Illuminate\Support\Facades\Gate;

class SubsidiaryController extends Controller {

    public function __construct() {
        $this->authorizeResource(Subsidiary::class, 'subsidiary');
    }
    
    public function create() {
    	return view('subsidiary.register');
    }

    public function store(Request $request) {
        $subsidiary = new Subsidiary;
        $subsidiary->create($request->all());
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

    public function update(Request $request, Subsidiary $subsidiary) {
        $subsidiary->update($request->all());
        return redirect()->route('subsidiaries.index');
    }

    public function destroy (Subsidiary $subsidiary) {
        $subsidiary->delete();
        return redirect()->route('subsidiaries.index');
    }
}
