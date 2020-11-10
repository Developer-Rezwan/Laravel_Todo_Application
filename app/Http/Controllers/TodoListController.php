<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Http\Requests\requestTodo;
use Illuminate\Http\Request;
use App\Http\Requests\updateRequest;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->data['data'] = TodoList::orderBy('id','DESC')->get();
      return view('welcome',$this->data);

    }

    public function store(requestTodo $r)
    {
       if(TodoList::create($r->all())){
           return TodoList::select()->where('title',"$r->title")->get();

       }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TodoList::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return TodoList::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $r, $id)
    {
       if(TodoList::findOrFail($id)->update($r->all())){
           return TodoList::findOrFail($id);
       }

       /**Ei niyomeo kora jay
       $task = TodoList::findOrFail($id);
       $task->title = $r->tiitle;
       $task->save();
       ***/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(TodoList::findOrFail($id)->delete()){
            return 1;
        }
    }
}