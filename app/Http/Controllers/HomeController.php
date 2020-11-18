<?php

namespace App\Http\Controllers;

use App\District;
use App\Timing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $districts = District::all();
        $today = Carbon::now()->format('Y-m-d');

        $timings = Timing::where('district_id', 1)->get();

        return view('welcome',[
            'timings' =>$timings,
            'districts' => $districts,
            'today' => $today,
        ]);

    }

    public function singleDay(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');

        if ($request->ajax()) {
            $timings = DB::table('timings as t')
                ->join('ramadans as r', 't.ramadan_id', '=', 'r.id')
                ->where('t.district_id', '=', $request->district)
                ->where('r.date_english', '=', Carbon::now()->format('Y-m-d'))
                ->select('r.ramadan_no', 'r.date_english', 'r.date_bangla', 'r.day', 't.sehri_time', 't.iftar_time')
                ->get();

            return response()->json(['timings' => $timings, 'today' => $today], 200);
        }
        $districts = District::all();
        $today = Carbon::now()->format('Y-m-d');

        return view('welcome',[
            'districts' => $districts,
            'today' => $today,
        ]);

    }

    public function fullMonth(Request $request)
    {
        if ($request->ajax()) {
            $timings = DB::table('timings as t')
                ->join('ramadans as r', 't.ramadan_id', '=', 'r.id')
                ->where('t.district_id', '=', $request->district)
                ->select('r.ramadan_no', 'r.date_english', 'r.date_bangla', 'r.day', 't.sehri_time', 't.iftar_time')
                ->orderBy('t.ramadan_id')
                ->get();
//            $timings = Timing::where('district_id', '=', $request->district)->get();

            return response()->json(['timings' => $timings], 200);
        }
        $districts = District::all();
        $today = Carbon::now()->format('Y-m-d');

        return view('welcome',[
            'districts' => $districts,
            'today' => $today,
        ]);

    }

    public function district(Request $request)
    {
        if ($request->ajax()) {
            $timings = DB::table('timings as t')
                ->join('ramadans as r', 't.ramadan_id', '=', 'r.id')
                ->where('t.district_id', '=', $request->district)
                ->select('r.ramadan_no', 'r.date_english', 'r.date_bangla', 'r.day', 't.sehri_time', 't.iftar_time')
                ->get();
//            $timings = Timing::where('district_id', '=', $request->district)->get();

            return response()->json(['timings' => $timings], 200);
        }
        $districts = District::all();
        $today = Carbon::now()->format('Y-m-d');

        return view('welcome',[
            'districts' => $districts,
            'today' => $today,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
