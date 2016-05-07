<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller {

    public function createTodo(Request $request){

        $this->validate($request, [
            'title'  => 'required',
            'text' => 'required'
        ]); 

        $todo = new Todo;
        $todo->title  = $request->input('title');
        $todo->text = $request->input('text');
        $todo->status = 0; // To Do
        $todo->save();

        return redirect("/");
    }
 
}
