<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    
    public function index()
    {
        $tasks =Task::all();
        
        return view('tasks.index',[
            'tasks'=>$tasks,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create',[
             'task' => $task,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // バリデーション
        $this->validate($request,[
            'status' =>'required|max:10',
            'content'=>'required|max:255'
            
            ]);
            
            
        $task = new Task;
        $task->status =$request->status;
        $task->content =$request->content;
        $task->save();
        
        return redirect('/');
    }

    
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);    }

    

    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate($request,[
            'status' =>'required|max:10',
            'content' =>'required|max:255',
            
            ]);
            
            
        $task = Task::findOrFail($id);
        $task->status =$request->status;
        $task->content = $request->content;
        $task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
