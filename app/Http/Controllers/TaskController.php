<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{

    public function index()
    {
        $tasks= Task::where('status','1')->get();
        return view('welcome',compact('tasks'));
    }
    public function store(Request $request)
    {
      $data_save = new Task;
      $data_save->name = $request->task;
      $data_save->status = 1;
      $data_save->save();
      if($data_save)
      {
        return redirect()->back()->with('success','Task Added SuccessFully');
      }else{
        return redirect()->back()->with('error','Something went wrong');
      }

    }
    public function updateTask($id)
    {
        $update = Task::where('id',$id)->first();
        $update->status = '2';
        $update->save();
        if($update)
      {
        return redirect()->back()->with('success','Task Updated SuccessFully');
      }else{
        return redirect()->back()->with('error','Something went wrong');
      }
    }
    public function getAll()
    {
        $tasks = Task::get();
        return view('welcome',compact('tasks'));
    }
    public function delete($id)
    {
        $task = Task::where('id',$id)->delete();
        if($task)
      {
        return redirect()->back()->with('success','Task Deleted SuccessFully');
      }else{
        return redirect()->back()->with('error','Something went wrong');
      }

    }
}
