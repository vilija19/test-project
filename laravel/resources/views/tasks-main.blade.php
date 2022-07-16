@extends('layouts.main')
@section('content')
@if (session('message'))
<div style="color:green;">
    {!! session('message') !!}
</div>
@endif
@if (session('error'))
<div style="color:red;">
    {!! session('error') !!}
</div>
@endif
<h3>List of tasks</h3><a href="/task/create">Create new task</a>
<style>
table, th, td {
  border: 1px solid black;
  padding: 5px;
}
</style>
<table class="unstyledTable">
<thead>
<tr>
<th>id</th>
<th>title</th>
<th>content</th>
<th>status</th>
<th>creator</th>
<th>labels</th>
<th>created_at</th>
<th>updated_at</th>
<th>action</th>
</tr>
</thead>
<tbody>
@foreach ($tasks as $task)
<tr>
<td>{{$task->id}}</td>
<td>{{ Str::limit($task->title,25) }}</td>
<td>{{ Str::limit($task->content,25) }}</td>
<td>{{$task->status->name}}</td>
<td>{{$task->creator_id}}</td>
<td>@foreach ($task->labels as $label)
    {{ $label->name }},
@endforeach</td>
<td>{{$task->created_at}}</td>
<td>{{$task->updated_at}}</td>
<td>
    <div>
        <div style="float: left;margin-left: 5px;"><a href="task/{{$task->id}}/edit">edit</a></div>
        <div style="float: left;margin-left: 5px;">
        <form class="generated-form"  method="POST" action="/task/{{$task->id}}"  target="_self">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
        </form>
        </div>
    </div>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection