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
                                <h5 class="card-title m-0">Изменить подписчика</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="update-group" method="POST"
                                                            action="{{ route('update-subscriber',[$subscriber->id]) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="put" />
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Имя :</label>
                                                        <input name="name" type="text"
                                                            class="form-control" placeholder="" value="{{ $subscriber->name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Группа :</label>
                                                        <select  name="gid" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                            @foreach ($groups as $group)
                                                                @if ($group->id === $subscriber->gid )
                                                                    <option selected value="{{ $group->id }}">{{ $group->name }}</option>
                                                                @else
                                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Телефон:</label>
                                                        <input name="phone" type="text"
                                                            class="form-control" placeholder="" value="{{ $subscriber->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Описание </label>
                                                        <textarea name="desc" class="form-control" rows="4" placeholder="Введите краткое описание группы">{{ $subscriber->desc }}</textarea>
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
                                                        class="form-control" disabled value="{{ $subscriber->created_at }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Изменено:</label>
                                                    <input type="text"
                                                        class="form-control" disabled value="{{ $subscriber->updated_at }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Создал:</label>
                                                    <input type="text"
                                                        class="form-control" disabled value="{{ $subscriber->admin->name }}">
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
