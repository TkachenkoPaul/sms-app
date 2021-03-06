@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i>Ошибка</h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
                    </div>
        </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Именить группу</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="update-group" method="POST"
                                                            action="{{ route('update-group',[$group->id]) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="put" />
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Имя группы:</label>
                                                        <input name="name" type="text"
                                                            class="form-control" placeholder="" value="{{ $group->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Описание </label>
                                                        <textarea name="desc" class="form-control" rows="4" placeholder="Введите краткое описание группы">{{ $group->desc }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Создано:</label>
                                                    <input type="text"
                                                        class="form-control" disabled value="{{ $group->created_at }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Изменено:</label>
                                                    <input type="text"
                                                        class="form-control" disabled value="{{ $group->updated_at }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Создал:</label>
                                                    <input type="text"
                                                        class="form-control" disabled value="{{ $group->admin->name }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit" form="update-group">Изменить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop
