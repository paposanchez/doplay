<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\category;
Use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarea = Task::where('category', '1')
        ->where('isArchived', '0')
        ->orderBy('createdAt', 'DESC')
        ->paginate(3);
        $progreso = Task::where('category', '2')
            ->where('isArchived', '0')
            ->orderBy('createdAt', 'DESC')
            ->paginate(3);
        $finalizada = Task::where('category', '3')
            ->where('isArchived', '0')
            ->orderBy('createdAt', 'DESC')
            ->paginate(3);
        return view('task.index', compact('tarea','progreso','finalizada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria=category::all();
        return view('task.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea              = new Task;
        $tarea->name        = $request->name;
        $tarea->category    = $request->category;
        $tarea->createdAt   = Carbon::now();
        $tarea->isArchived  = 0;
        $tarea->owner       = "Papo";
        $tarea->save();

        return view('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea     =Task::FindOrFail($id);
        $categoria  =category::all();
        return view('task.edit',compact('tarea','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tarea             = Task::find($id);
        $tarea->name        = $request->name;
        $tarea->category    = $request->category;
        $tarea->save();

        return redirect('task');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    public function archived(Request $request,$id)
    {
        $tarea             = Task::find($id);
        $tarea->isArchived = 1;
        $tarea->save();

        return redirect('task');
    }
}
