<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Status;
use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Echo '<h1>This page will show list of all tasks</h1>';

        $data['tasks'] = ModelsTask::all();

        return view('tasks-main', $data);
    }

    /**
     * Show the form for creating a new resource.
     * route GET|HEAD task/create
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* FOR HW_20
        $html = '<form action="/task" method="POST">';
        $html .= '<label for="name">Task name:</label><br>';
        $html .= '<input type="text"  name="name"><br><br>';
        $html .= '<input type="submit" value="Submit"></form>';
        $html .= '</form>';
        
        echo $html;
        */
        $data['users'] = \App\Models\User::all();
        $data['statuses'] = Status::all();
        $data['labels'] = Label::all();
        
        return view('form-create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = '';
        $validatedData = $request->validate([
            'task_name' => 'required|min:10|max:60',
            'content' => 'required|min:10|max:255',
            'creator_id' => 'required|integer',
            'labels' => 'array',
            'status_id' => 'required|integer',
        ]);

        $task = new ModelsTask();
        $task->creator_id = $request->creator_id;
        $task->title = $request->task_name;
        $task->content = $request->content;
        $task->status_id = $request->status_id;
        $task->save();
        $task->labels()->sync($request->labels);
        $message = '<p>Task "' . $task->title . '" has been created and stored</p>';

        return redirect('/task')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Echo '<h1>Information about task with id -  ' . $id . ' ...</h1>';

        $task = ModelsTask::where('id', $id)->first();
        if ($task) {
            Echo '<h2>Task status is : ' . $task->status->name . '</h2>';
            Echo '<h2>Task labels are : </h2>';
            foreach ($task->labels as $key => $label) {
                Echo '<h3>label id '.$label->id.' is : ' . $label->name . '</h3>';
            }
        }
        echo '<hr>';
        Echo '<h2>Other info not related to task above </h2>';
        $labelId = random_int(7,9);
        $label = Label::where('id', $labelId)->first(); 
        if ($label) {
            Echo '<h2>Tasks with label id '.$labelId.' are: </h2>';
            foreach ($label->tasks as $key => $task) {
                Echo '<h3>task id '.$task->id.' is : ' . $task->title . '</h3>';
            }
        }
        $statusId = random_int(7,9);
        $status = Status::where('id', $statusId)->first();
        if ($status) {
            Echo '<h2>Tasks with status id '.$statusId.' are: </h2>';
            foreach ($status->tasks as $key => $task) {
                Echo '<h3>task id '.$task->id.' is : ' . $task->title . '</h3>';
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     * route GET|HEAD        task/{task}/edit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* FOR HW_20
        $html = '<form action="/task/'.$id.'" method="POST">';
        $html .= '<label for="name">Change Task name for task id '.$id.' :</label><br>';
        $html .= '<input type="hidden" name="_method" value="PUT">';
        $html .= '<input type="text"  name="name"><br><br>';
        $html .= '<input type="submit" value="Submit"></form>';
        $html .= '</form>';
        
        echo $html;
        */

        $data['task'] = ModelsTask::where('id', $id)->first();
        if (!$data['task']) {
            return redirect('/task')->with('error', 'Task with id ' . $id . ' not found');
        }
        $data['statuses'] = Status::all();
        $data['labels'] = Label::all();

        return view('form-task-edit',$data);
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
        $message = '';

        $validatedData = $request->validate([
            'task_name' => 'required|min:10|max:60',
            'content' => 'required|min:10|max:255',
            'status_id' => 'required|integer',
            'labels' => 'array',
        ]);

        $task = ModelsTask::where('id', $id)->first();
        if ($task) {
            $task->title = $request->task_name;
            $task->content = $request->content;
            $task->status_id = $request->status_id;
            $task->save();
            $task->labels()->sync($request->labels);

            $message = '<p>Task "' . $task->title . '" has been updated</p>';
        }
        else {
            $message = '<p>Task with id ' . $id . ' not found</p>';
        }
        return redirect('/task')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = '';
        $task = ModelsTask::where('id', $id)->first();
        if ($task) {
            $message = '<p>Task "' . $task->title . '" has been deleted</p>';
            /**
             * Удаляем все связи между задачей и метками. 
             * Иначе будет ошибка при удалении задачи.
             */
            $task->labels()->detach();
            $task->delete();
        }
        else {
            $message = '<p>Task with id ' . $id . ' not found</p>';
        }
        return redirect('/task')->with('message', $message);
    }
}
