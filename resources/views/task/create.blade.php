@extends('layout')
 @section('content')


 <div id="app">

    {{Form::open(['route' => 'task.store','files' => true ])}}
    <div class="form-group">
        <label>Status</label>
        {{Form::select(
            'status_id',
             $statuses ,
              null,
            ['class' => 'form-control select2']
            )}}
    </div>
    <div class="form-group">
        <label>Status</label>
        {{Form::select(
            'type_id',
             $types ,
              null,
            ['class' => 'form-control select2']
            )}}
    </div>
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Название</label>
                <input type="text"
                       class="form-control"
                       placeholder=""
                       value=""
                       name="title">
            </div>
        </div>
    </div>
    <button class="btn btn-success pull-right">Добавить</button>
    {{Form::close()}}

 {{-- <form-create-task :statuses="{{json_encode($all_status) }}" :types="{{json_encode($all_type) }}"></form-create-task> --}}
 </div>


@endsection

