@extends('layout')
 @section('content')


 <div id="app">
 <form-create-task :statuses="{{json_encode($all_status) }}" :types="{{json_encode($all_type) }}"></form-create-task>
 </div>


@endsection

