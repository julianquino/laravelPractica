<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App;
use App\Shift;
use App\Company;
use App\Subsidiary;
use Illuminate\Support\Facades\Gate;
class ShiftController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Shift::class, 'shift');
    }
    public function index() {
       	return view('shift.index',['subsidiaries'=>Auth::user()->company->subsidiaries]);
    }

    public function show(Shift $shift) {
    	return view('shift.show',['shift'=>$shift]);
    }

    public function create() {
    	return view('shift.register', ['subsidiaries'=>Auth::user()->company->subsidiaries]);
    }

    public function store(Request $request) {
        $shift = new Shift;
        $shift->create($request->all());
    	return redirect()->route('shifts.index');
    }

    public function edit(Shift $shift) {
        return view('shift.edit',['shift'=>$shift]);
    }

    public function update(Request $request, Shift $shift) {
        $shift->update($request->all());
        return redirect()->route('shifts.index');
    }

    public function destroy (Shift $shift) {
        $shift->delete();
        return redirect()->route('shifts.index');
    }

    public function anyShow(Company $company, Subsidiary $subsidiary, Shift $shift){
        if($shift->subsidiary_id == $subsidiary->id && $subsidiary->company_id == $company->id) {
            return view('shift.anyShow',[ 'company'=>$company, 'subsidiary'=>$subsidiary, 'shift'=>$shift]);
        }
        return abort(404);
    }
}
