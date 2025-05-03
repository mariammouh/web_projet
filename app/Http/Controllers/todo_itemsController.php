<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\todo_items;

class todo_itemsController extends Controller
{
    public function show($id)
    {
        $todoItems = todo_items::where('user_id', $id)->get();
              
        return view('list/todolist', ['todolist' => $todoItems]);
    }
    public function destroy($id_item){
        $todoItem = todo_items::findOrFail($id_item);
       
        $todoItem->delete();
        return redirect("todolist/$todoItem->user_id");
    }
  public function  complete($id_item){
    $todoItem = todo_items::findOrFail($id_item);
    $todoItem->update([
        'completed' => true,
    ]);
    return redirect()->back();

  }


    public function store($id){
  $itemlist=new todo_items();
  $itemlist->content=request('task');
  error_log(request('task'));
  $itemlist->user_id=$id;
  $itemlist->save();
        return redirect("todolist/$id");
    }
}
