<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();

        $res = [
            "status" => "ok",
            "message" => "Lista de Personas",
            "code" => 1000,
            "data" => $persons
        ];
        return $res;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonPerson = $request->json()->all();

        $person = new Person($jsonPerson);
        

        $person->save();

        $res = [
            "status" => "ok",
            "message" => "Persona creada",
            "code" => 1003,
            "data" => $person
        ];
        
        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person =Person::find($id);
        
        if(isset($person)){
            
            $res = [
                "status" => "ok",
                "message" => "Persona por Id ".$id,
                "code" => 1001,
                "data" => $person
            ];
        } else{
            $res = [
                "status" => "fail",
                "message" => "No se encontro persona por Id ".$id,
                "code" => 1011,
                "data" => null
            ];
        }
        return $res;

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
       
    $person = Person::find($id);

    if(isset($person)){
        $person->update($request->json()->all());

        $res = [
            "status" => "ok",
            "code" => 1005,
            "message" => "Persona actualizada"
        ];
    } else{
        $res = [
            "status" => "fail",
            "code" => 1015,
            "message" => "No se encontro Persona a actualizar"
        ];
    }
    return $res;
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $person = Person::find($id);

    if(isset($person)){
        $person->delete();

        $res = [
            "status" => "ok",
            "code" => 1004,
            "message" => "Persona eliminada"
        ];
    } else{
        $res = [
            "status" => "fail",
            "code" => 1014,
            "message" => "No se encontro Persona a eliminar"
        ];
    }
    return $res;
   

    }
}
