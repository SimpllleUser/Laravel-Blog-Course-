@extends('layout') @section('content')

<div class="row">

    <h1>Hello you on page with all status for tasks</h1>
    <div class="col-6">
        <hr> @foreach($allTasks as $task)
        <div class="card">
           {{-- <h3> {{ $task->getStatus() }} </h3> --}}
           {{ $task->getSomeUser() }}

        </div>
        @endforeach
    </div>

<a href="{{ route('task.create') }}">create_task</a>

</div>
@endsection
