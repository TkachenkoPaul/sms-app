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
                                <h5 class="card-title m-0">{{ $group->name }}</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group mb-2">
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target="#modal-default">
                                                <i class="fa fa-plus"> </i> Добавить</button>
                                        </div>
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Добавить подписчика</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="add-group" method="POST"
                                                            action="{{ route('add-subscriber') }}">
                                                            @csrf
                                                            <input type="hidden" name="gid" value="{{ $group->id }}" />
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Имя :</label>
                                                                        <input name="name" type="text"
                                                                            class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Телефон :</label>
                                                                        <input name="phone" type="text"
                                                                            class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                        <label>Описание :</label>
                                                                        <textarea name="desc" class="form-control" rows="3" placeholder="Введите краткое описание"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Закрыть</button>
                                                        <button type="submit" form="add-group"
                                                            class="btn btn-primary">Добавить</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-2">
                                            <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                                                data-target="#modal-import">
                                                <i class="fa fa-upload"> </i> Импорт</button>
                                        </div>
                                        <div class="modal fade" id="modal-import">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Импорт списка подписчиков</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form enctype="multipart/form-data" id="import-group" method="POST"
                                                            action="{{ route('import-subscribers') }}">
                                                            @csrf
                                                            <input type="hidden" name="gid" value="{{ $group->id }}" />
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" class="custom-file-input"
                                                                        id="customFile">
                                                                    <label class="custom-file-label"
                                                                        for="customFile">Загрузите файл</label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Закрыть</button>
                                                        <button type="submit" form="import-group"
                                                            class="btn btn-primary">Импортировать</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="example1"
                                            class="table table-bordered compact table-hover table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Описание</th>
                                                    <th>Добавил</th>
                                                    <th>Добавлено</th>
                                                    <th>Изменено</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($subscribers ?? '')
                                                    @foreach ($subscribers ?? '' as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td>
                                                                {{ $item->desc }}
                                                            </td>
                                                            <td>{{ $item->admin->name }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td class="project-actions text-center">
                                                                <a class="btn btn-info btn-block btn-sm"
                                                                    href="{{ route('edit-subscriber', ['id' => $item->id]) }}">
                                                                    <i class="fas fa-pencil-alt">
                                                                    </i>
                                                                </a>
                                                                <a class="btn btn-danger  btn-block btn-sm"
                                                                    href="{{ route('destroy-subscriber', ['id' => $item->id]) }}">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Описание</th>
                                                    <th>Добавил</th>
                                                    <th>Добавлено</th>
                                                    <th>Изменено</th>
                                                    <th>Действия</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
