<?php

namespace App\Http\Controllers;

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
