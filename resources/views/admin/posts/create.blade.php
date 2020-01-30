@extends('admin\layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить статью
            <small>приятные слова..</small>
        </h1>
    </section>
<h1>Minute 20:19</h1>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем статью</h3>
            </div>
            {{Form::open(['route' => 'posts.store','files' => true ])}}
            <div class="box-body">
            @include('admin.errors')
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Лицевая картинка</label>
                        <input type="file" id="exampleInputFile" name="image">

                        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        {{Form::select(
                            'category_id',
                             $categories ,
                              null,
                            ['class' => 'form-control select2']
                            )}}
                    </div>
                    <div class="form-group">
                        <label>Теги</label>
                        <label>Категория</label>
                        {{Form::select(
                            'tags[]',
                             $tags,
                              null,
                            ['class' => 'form-control select2' ,
                             'multiple' => 'multiple',
                             'data-placeholder' => 'Choose tags'
                            ]
                            )}}
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                        <label>Дата:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="date" class="form-control pull-right" value="{{old('date')}}" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_features" class="minimal">
                        </label>
                        <label>
                            Рекомендовать
                        </label>
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="status" class="minimal">
                        </label>
                        <label>
                            Черновик
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
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
        {{Form::close()}}
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
