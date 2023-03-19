<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['superheroes']=Superheroe::paginate(5);
        return view('superheroe.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superheroe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosSuperheroe=request()->except('_token');
        if($request->hasFile('imagen')) {
            $datosSuperheroe['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Superheroe::insert($datosSuperheroe);
        // return response()->json($datosSuperheroe);
    }

    /**
     * Display the specified resource.
     */
    public function show(Superheroe $superheroe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Superheroe $superheroe)
    {
        $superheroe=Superheroe::findOrFail($id);
        return view('superheroe/edit', compact('superheroe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Superheroe $superheroe)
    {
        $datosEmpleado=request()->except('_token','_method');
        if($request->hasFile('Foto'))
        {
            $empleado=Superheroe::findOrFail($id);
            Storage::delete('public/'.$superheroe->imagen);
            $datosSuperheroe['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Empleado::where('id','=',$id)->update($datosSuperheroe);

        $empleado=Empleado::findOrFail($id);
        return view('superheroe/edit', compact('superheroe'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Superheroe $superheroe)
    {
        $superheroe=Superheroe::findOrFail($id);

        if(Storage::delete('public/'.$superheroe->imagen))
        {
            Superheroe::destroy($id);
        }
     
        return redirect('superheroe');
    }
}
