@extends('layout')

@section('content')
    <div class="row">
        <h1>Hello you on page with all status for tasks</h1>
<div class="col-6">
{{ $allTasks[1] }}
<hr>



{{ $allTasks[1]->testGetSomeInfo() }}
{{-- @foreach($allTasks as $task)
{{ $task}}
@endforeach --}}



</div>
    </div>
@endsection
{{-- [0]->getTitleStatusTask() --}}
