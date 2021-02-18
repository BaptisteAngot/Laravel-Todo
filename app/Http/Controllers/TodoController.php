<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
    public function all(){
        $response = new Response();
        $response->setContent(Todo::all());
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }

    public function getOne($id){
        $response = new Response();
        $response->setContent(Todo::find($id));
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }

    public function create(Request $request)
    {
        $todo = new Todo();
        $todo->name = $request->post('name');
        $todo->description = $request->post('description');
        $todo->save();
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $toUpdate = $request->post();
        // On update uniquement les champs qui existent dans le POST
        // Fonctionne uniquement si les keys ont le même nom que les fields en BDD
        foreach($toUpdate as $key => $value){
            $todo->$key = $value;
        }
        $todo->save();
    }

    public function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
    }
}
