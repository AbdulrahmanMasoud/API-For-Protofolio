<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer = DB::table('employers')->select('name','bio','avater','cv')->get();
        return response()->json([
            'user' => $employer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('employers')->where('id', 1)->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'avater' => $request->avater,
            'cv' => $request->cv,
        ]);
    }

    
}
