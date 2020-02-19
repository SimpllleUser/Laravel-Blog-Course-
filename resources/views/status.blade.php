@extends('layout')

@section('content')
    <div class="row">
        <h1>Hello you on page with all status for tasks</h1>
<div class="col-6">
{{ $statusTasks }}
</div>
    </div>
@endsection
