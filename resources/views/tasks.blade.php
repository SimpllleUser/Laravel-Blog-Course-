@extends('layout') @section('content')

<div class="row">

    <h1>Hello you on page with all status for tasks</h1>
    <div class="col-6">
        {{-- {{ dd($allTasks[1]->getSomeUser()) }} --}}
        <hr> @foreach($allTasks as $task)
        <div class="card">
            <h3 class="text-primary">Name user {{ $task->getSomeUser() }}</h3>
            <h1> ID :{{ $task->id }} <br> name : {{ $task->title}}</h1>
            <h3> type : {{ $task->getType() }}</h3>
            <h3> status : {{ $task->getStatus() }}</h3>
        </div>
        @endforeach
    </div>

<a href="/create_task">create_task</a>

</div>
@endsection {{-- [0]->getTitleStatusTask() --}}
