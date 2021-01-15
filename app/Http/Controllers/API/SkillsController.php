<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employer = DB::table('skills')->select('id','skill_name','skill_level')->get();
        return response()->json([
            'skills' => $employer,
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('skills')->insert([
            'skill_name' => $request->skill_name,
            'skill_level' => $request->skill_level
        ]);
        return 'added done';
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('skills')->where('id', $request->id)->update([
            'skill_name' => $request->skill_name,
            'skill_level' => $request->skill_level
        ]);
        return 'updated done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('skills')->where('id', $id)->delete();
        return 'deleted done';
    }
}
