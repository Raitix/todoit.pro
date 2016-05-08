<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller {

    public function createTodo(Request $request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'text' => 'required'
        ]); 

        $todo = new Todo;
        $todo->title  = $request->input('title');
        $todo->text = $request->input('text');
        $todo->status = 0; // 0 = To Do
        $todo->save();

        return redirect("/");
    }

    // BEGIN ajax rpcs

    public function changeStatus(Request $request)
    {
        $this->validate($request, [
            'id'  => 'required|numeric',
            'status' => 'required|numeric'
        ]);

        $todo = Todo::where('id', $request->input('id'))->first();
        $todo->status = $request->input('status');

        if ($todo->update()) {
            return json_encode("ok");
        } else {
            return "Fail upon changing status";
        }
    }

    // END ajax rpcs
 
}
