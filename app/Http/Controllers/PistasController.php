<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pistas = Pista::all();
        return view('pistas.index',['pistas'=>$pistas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('pistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request,[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['tenis', 'padel', 'futbol', 'futbolSala']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required|decimal:0,2',
            'precioPista'=> 'required|decimal:0,2'
        ]);

        $pista=Pista::create([
            'luz'=>$request['luz'] ?? 0,
            'tipoPista'=>$request['tipoPista'],
            'cubierta'=>$request['cubierta'] ?? 0,
            'disponible'=>$request['disponible'] ?? 0,
            'precioLuz'=>$request['precioLuz'],
            'precioPista'=>$request['precioPista']
        ]);
        if ($pista){
            return redirect('/pistas');
        }else{
            return back();
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pista $pista)
    {
        $anteriorPista = Pista::where('id', '<', $pista->id)->max('id');
        $siguientePista = Pista::where('id', '>', $pista->id)->min('id');
        return view('pistas.show',compact('pista','anteriorPista','siguientePista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pista $pista)
    {
        return view('pistas.edit',compact('pista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pista $pista)
    {
        $this->validate($request,[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['tenis', 'padel', 'futbol', 'futbolSala']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required|decimal:0,2',
            'precioPista'=> 'required|decimal:0,2'
        ]);

        $pista->luz=$request['luz']?? 0;
        $pista->tipoPista=$request['tipoPista'];
        $pista->cubierta=$request['cubierta'] ?? 0;
        $pista->disponible=$request['disponible'] ?? 0;
        $pista->precioLuz=$request['precioLuz'];
        $pista->precioPista=$request['precioPista'];

        $pista->save();

        return redirect("/pistas/$pista->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pista $pista)
    {
        try{
            $pista->deleteOrFail();
        } catch (\Throwable $e) {
            return redirect ('/');
        }
        return redirect('/pistas');
    }
}
