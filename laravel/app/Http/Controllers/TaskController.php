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
        Echo '<h1>This page will show list of all users</h1>';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = '<form action="/task" method="POST">';
        $html .= '<label for="name">Task name:</label><br>';
        $html .= '<input type="text"  name="name"><br><br>';
        $html .= '<input type="submit" value="Submit"></form>';
        $html .= '</form>';
        
        echo $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Echo '<h1>Task ' . $request['name'] . ' has been created and stored</h1>';
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $html = '<form action="/task/'.$id.'" method="POST">';
        $html .= '<label for="name">Change Task name for task id '.$id.' :</label><br>';
        $html .= '<input type="hidden" name="_method" value="PUT">';
        $html .= '<input type="text"  name="name"><br><br>';
        $html .= '<input type="submit" value="Submit"></form>';
        $html .= '</form>';
        
        echo $html;
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
        Echo '<h1>Task ' . $id . '  has been stored with name ' . $request['name'] . '</h1>';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Echo '<h1>Task ' . $id . '  has been  destroed </h1>';
    }
}
