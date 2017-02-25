<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
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
        $this->taskValidate($request);
        
        // $task = new Task;
        // $task->status = $request->status;
        // $task->content = $request->content;
        // $task->save();
        
        $request->user()->tasks()->create([
            'status'  => $request->status,
            'content' => $request->content,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);

            $data = [
                'user' => $user,
                'task' => $task,
            ];
        }
        return view('tasks.show', $data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = $user->tasks()->find($id);
        
            $data = [
                'user' => $user,
                'task' => $task,
            ];
        }
        
        return view('tasks.edit', $data);
        
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
        $this->taskValidate($request);
        
        $task = $request->user()->tasks()->find($id);
        $task->update(['status' => $request->status]);
        $task->update(['content' => $request->content]);
        
        
        // dd($request->user()->tasks()->find($id));
        // $request->user()->tasks()->find($id)->create([
        //     'status'  => $request->status,
        //     'content' => $request->content,
        // ]);

        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $task = Task::find($id);
        
        if (\Auth::user()->id === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
    
    public function taskValidate ($request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
            'status' => 'required|max:10',
        ]);
    }
}
