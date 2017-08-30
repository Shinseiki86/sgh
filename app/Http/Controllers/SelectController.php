<?php

namespace SGH\Http\Controllers;

use Illuminate\Http\Request;

use SGH\Http\Requests;
use SGH\Http\Controllers\Controller;
use SGH\Models\Departamento;
use SGH\Models\Ciudad;
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $departamentos = Departamento::lists('DEPA_NOMBRE','DEPA_ID')->prepend('Seleccione');
        return view('select',['departamentos'=>$departamentos]);
    }

    public function getCiudades(Request $request, $id){
        dd($request);
        if($request->ajax()){
            $ciudades = Ciudad::ciudades($id);            
            return response()->json($ciudades);
        }
    }

    public function buscaCiudad(Request $request)
    { 
        $data=Ciudad::select('CIUD_NOMBRE','CIUD_ID')->where('DEPA_ID',$request->id)->take(100)->get();
        return response()->json($data);
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
