@extends('admin\layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить подписчика
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
{{Form::open(['route' => 'subscribers.store'])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем подписчика</h3>
            </div>
            @include('admin.errors')
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}" placeholder="">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-default">Назад</button>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}

    </section>
    <!-- /.content -->
</div>
@endsection
