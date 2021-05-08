<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes=Route::all();
        return view('panel.route',compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.addroute');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route=Route::create(
            [
                'from'=>$request->input('from'),
                'to'=>$request->input('to'),
                'toll'=>$request->input('toll'),
            ]
        );
        $route=Route::create(
            [
                'from'=>$request->input('to'),
                'to'=>$request->input('from'),
                'toll'=>$request->input('toll')
            ]
        );
        if (!empty($route)){
            return redirect()->route('route.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route=Route::findOrFail($id);
        return view('panel.routeTrainshow',compact('route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route=Route::where('id', $id)->firstOrFail();
        if($route){
            return view('panel.editroute',compact('route'));
        }
        return redirect()->route('route.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $route = Route::findOrFail($id);
        $route->update($request->all());
        return redirect()->route('route.index');
    }

    public function showTrain($id)
    {
        $route = Route::find($id);
        if($route){
            $trains=$route->trains->toArray();
            if($trains){
                return response()->json([
                    'status' => true,
                    'trains' => $trains,
                ],200);
            }
            else{
                return response()->json([
                    'status' => false,
                ],200);
            }
                
        }
        else{
            return response()->json([
                'status' => false,
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        //
    }
}
