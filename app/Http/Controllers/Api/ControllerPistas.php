<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pista;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ControllerPistas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pistas = Pista::all();
        $respuesta = ["pistas"=> $pistas];
        return response($respuesta);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validacion=Validator::make($request->all(),[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['tenis', 'padel', 'futbol', 'futbolSala']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required|decimal:0,2',
            'precioPista'=> 'required|decimal:0,2'
        ]);

        if($validacion->fails()){
            return response("Error en la validación de una pista",Response::HTTP_BAD_REQUEST);
        }

        $pista = new Pista();
        $pista->luz = $request->luz ?? 0;
        $pista->tipoPista = $request->tipoPista;
        $pista->cubierta = $request->cubierta ?? 0;
        $pista->disponible = $request->disponible ?? 0;
        $pista->precioLuz = $request->precioLuz;
        $pista->precioPista = $request->precioPista;

        $pista->save();

        return response("Se ha almacenado la pista correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pista $pista)
    {
        return response($pista);
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
        $validacion=Validator::make($request->all(),[
            'luz'=>'boolean',
            'tipoPista'=>Rule::in(['tenis', 'padel', 'futbol', 'futbolSala']),
            'cubierta' =>'boolean',
            'disponible'=>'boolean',
            'precioLuz'=> 'required|decimal:0,2',
            'precioPista'=> 'required|decimal:0,2'
        ]);

        if($validacion->fails()){
            return response("No se ha podido modificar la pista",Response::HTTP_NOT_MODIFIED);
        }else {

            $pista->luz = $request['luz'] ?? 0;
            $pista->tipoPista = $request['tipoPista'];
            $pista->cubierta = $request['cubierta'] ?? 0;
            $pista->disponible = $request['disponible'] ?? 0;
            $pista->precioLuz = $request['precioLuz'];
            $pista->precioPista = $request['precioPista'];

            $pista->save();
            return response("Pista modificada");
        }
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
            return "La pista no se ha eliminado";
        }
        return "La pista se ha eliminado correctamente";
    }
}
