@extends('layouts.main')
@section('content')
@if (session('message'))
<div style="color:green;">
    {!! session('message') !!}
</div>
@endif
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="generated-form"  method="POST" action="/task"  target="_self">
<fieldset>
  @csrf
  <legend> Create Task:: </legend>
  <label for="tname">Task name(title):</label><br>
  <input type="text" id="tname" name="task_name" value="{{old('task_name')}}"><br>
  <label for="content">Description:</label><br>
  <textarea type="text" rows="5" cols="33" id="content" name="content">{{ old('content') }}</textarea><br>
  <label for="creator_id">Choose a creator:</label><br>
   <select id="creator_id" name="creator_id">
    @foreach ($users as $user)
      @if (old('creator_id') && $user->id == old('creator_id'))
        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
      @else
      <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endif
    @endforeach
   </select> <br><br>
  <br>
  <input type="submit" value="Submit">
</fieldset>
</form>
@endsection