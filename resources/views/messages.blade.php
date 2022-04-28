@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Рассылка</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
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
                    <div class="col-12 col-sm-6 col-md-3 hover">
                        <div class="info-box elevation-3" onclick="showModal1()">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sms"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">IGRUSHKI</span>
                                <span class="info-box-number">
                                    140
                                    <small>шт.</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box elevation-3  hover " onclick="showModal2()">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-sms"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">TKANI</span>
                                <span class="info-box-number">130 <small>шт.</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box elevation-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-comment-dots"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Очередь</span>
                                <span class="info-box-number">
                                    {{ $inQueue }}
                                    <small>шт.</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">{{ $header }}</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-plus"></i> Создать
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">

                                <div class="modal fade" id="modal-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Создать рассылку</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="add-group-1" method="POST"
                                                    action="{{ route('store-messages') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Источник:</label>
                                                                <select name="src" id="select-modal-src-1"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                    @foreach ($sources ?? ' ' as $source)
                                                                        @if ($source->id === 1)
                                                                            <option value="{{ $source->id }}"
                                                                                selected="selected">
                                                                                {{ $source->name }}</option>
                                                                        @else
                                                                            <option value="{{ $source->id }}">
                                                                                {{ $source->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Группа:</label>
                                                                <select name="gid"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                    @foreach ($groups ?? ' ' as $group)
                                                                        @if ($group->id === 13)
                                                                            <option value="{{ $group->id }}"
                                                                                selected="selected">
                                                                                {{ $group->name }}</option>
                                                                        @else
                                                                            <option value="{{ $group->id }}">
                                                                                {{ $group->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Описание </label>
                                                                <textarea maxlength="69" id="message" name="message" class="form-control" rows="4"
                                                                    placeholder="Введите сообщение для рассылки"></textarea>
                                                                <div class="pull-right" id="counter">0</div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            const messageEle = document.getElementById('message');
                                                            const counterEle = document.getElementById('counter');

                                                            messageEle.addEventListener('input', function(e) {
                                                                const target = e.target;

                                                                // Count the current number of characters
                                                                const currentLength = target.value.length;

                                                                counterEle.innerHTML = `${currentLength}`;
                                                            });
                                                        </script>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Закрыть</button>
                                                <button type="submit" form="add-group-1"
                                                    class="btn btn-primary">Добавить</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <div class="modal fade" id="modal-2">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Создать рассылку</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="add-group-2" method="POST"
                                                    action="{{ route('store-messages') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Источник:</label>
                                                                <select name="src" id="select-modal-src-2"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                    @foreach ($sources ?? ' ' as $source)
                                                                        @if ($source->id === 2)
                                                                            <option value="{{ $source->id }}"
                                                                                selected="selected">
                                                                                {{ $source->name }}</option>
                                                                        @else
                                                                            <option value="{{ $source->id }}">
                                                                                {{ $source->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Группа:</label>
                                                                <select name="gid"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                    @foreach ($groups ?? ' ' as $group)
                                                                        @if ($group->id === 14)
                                                                            <option value="{{ $group->id }}"
                                                                                selected="selected">
                                                                                {{ $group->name }}</option>
                                                                        @else
                                                                            <option value="{{ $group->id }}">
                                                                                {{ $group->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Описание </label>
                                                                <textarea maxlength="69" id="message" name="message" class="form-control" rows="4"
                                                                    placeholder="Введите сообщение для рассылки"></textarea>
                                                                <div class="pull-right" id="counter">0</div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            const messageEle = document.getElementById('message');
                                                            const counterEle = document.getElementById('counter');

                                                            messageEle.addEventListener('input', function(e) {
                                                                const target = e.target;

                                                                // Count the current number of characters
                                                                const currentLength = target.value.length;

                                                                counterEle.innerHTML = `${currentLength}`;
                                                            });
                                                        </script>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Закрыть</button>
                                                <button type="submit" form="add-group-2"
                                                    class="btn btn-primary">Добавить</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Создать рассылку</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="add-group" method="POST"
                                                    action="{{ route('store-messages') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Источник:</label>
                                                                <select name="src"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                    @foreach ($sources ?? ' ' as $source)
                                                                        <option value="{{ $source->id }}">
                                                                            {{ $source->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Группа:</label>
                                                                <select name="gid"
                                                                    class="form-control select2 select2-hidden-accessible"
                                                                    style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                                    @foreach ($groups ?? ' ' as $group)
                                                                        <option value="{{ $group->id }}">
                                                                            {{ $group->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- textarea -->
                                                            <div class="form-group">
                                                                <label>Описание </label>
                                                                <textarea maxlength="69" id="message" name="message" class="form-control" rows="4"
                                                                    placeholder="Введите сообщение для рыссылки"></textarea>
                                                                <div class="pull-right" id="counter">0</div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            const messageEle = document.getElementById('message');
                                                            const counterEle = document.getElementById('counter');

                                                            messageEle.addEventListener('input', function(e) {
                                                                const target = e.target;

                                                                // Count the current number of characters
                                                                const currentLength = target.value.length;

                                                                counterEle.innerHTML = `${currentLength}`;
                                                            });
                                                        </script>
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

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <form method="GET" action="{{ route('messages') }}" class="form-inline">
                                            <div class="input-group mr-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="date" class="form-control float-right"
                                                    id="reservation">
                                            </div>
                                            <div class="form-group mr-3">
                                                <select class="form-control select2bs4" name='src'>
                                                    <option value="0">Все</option>
                                                    @foreach ($sources as $source)
                                                        <option value="{{ $source->id }}">{{ $source->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Показать</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Сообщение</th>
                                                    <th>Статус</th>
                                                    <th>Создал</th>
                                                    <th>Источник</th>
                                                    <th>Группа</th>
                                                    <th>Создано</th>
                                                    <th>Изменено</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($messages ?? ' ' as $message)
                                                    <tr>
                                                        <td>{{ $message->id }}</td>
                                                        <td>{{ $message->name }}</td>
                                                        <td>{{ $message->phone }}</td>
                                                        <td>{{ $message->message }}</td>
                                                        <td>{{ $message->state }}</td>
                                                        <td>{{ $message->admin->name }}</td>
                                                        <td>{{ $message->source->name }}</td>
                                                        <td>{{ $message->group->name }}</td>
                                                        <td>{{ $message->created_at }}</td>
                                                        <td>{{ $message->updated_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Имя</th>
                                                    <th>Телефон</th>
                                                    <th>Сообщение</th>
                                                    <th>Статус</th>
                                                    <th>Создал</th>
                                                    <th>Источник</th>
                                                    <th>Группа</th>
                                                    <th>Создано</th>
                                                    <th>Изменено</th>
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
