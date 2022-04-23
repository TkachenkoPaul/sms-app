<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        SMS Рассылка
    </div>
    <!-- Default to the left -->
    <strong>&copy;</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/moment/moment-with-locales.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $('.toastsDefaultDanger').click(function() {
            $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"],
            language: {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                },
                "select": {
                    "rows": {
                        "_": "Выбрано записей: %d",
                        "1": "Выбрана одна запись"
                    },
                    "cells": {
                        "1": "1 ячейка выбрана",
                        "_": "Выбрано %d ячеек"
                    },
                    "columns": {
                        "1": "1 столбец выбран",
                        "_": "%d столбцов выбрано"
                    }
                },
                "searchBuilder": {
                    "conditions": {
                        "string": {
                            "startsWith": "Начинается с",
                            "contains": "Содержит",
                            "empty": "Пусто",
                            "endsWith": "Заканчивается на",
                            "equals": "Равно",
                            "not": "Не",
                            "notEmpty": "Не пусто",
                            "notContains": "Не содержит",
                            "notStarts": "Не начинается на",
                            "notEnds": "Не заканчивается на"
                        },
                        "date": {
                            "after": "После",
                            "before": "До",
                            "between": "Между",
                            "empty": "Пусто",
                            "equals": "Равно",
                            "not": "Не",
                            "notBetween": "Не между",
                            "notEmpty": "Не пусто"
                        },
                        "number": {
                            "empty": "Пусто",
                            "equals": "Равно",
                            "gt": "Больше чем",
                            "gte": "Больше, чем равно",
                            "lt": "Меньше чем",
                            "lte": "Меньше, чем равно",
                            "not": "Не",
                            "notEmpty": "Не пусто",
                            "between": "Между",
                            "notBetween": "Не между ними"
                        },
                        "array": {
                            "equals": "Равно",
                            "empty": "Пусто",
                            "contains": "Содержит",
                            "not": "Не равно",
                            "notEmpty": "Не пусто",
                            "without": "Без"
                        }
                    },
                    "data": "Данные",
                    "deleteTitle": "Удалить условие фильтрации",
                    "logicAnd": "И",
                    "logicOr": "Или",
                    "title": {
                        "0": "Конструктор поиска",
                        "_": "Конструктор поиска (%d)"
                    },
                    "value": "Значение",
                    "add": "Добавить условие",
                    "button": {
                        "0": "Конструктор поиска",
                        "_": "Конструктор поиска (%d)"
                    },
                    "clearAll": "Очистить всё",
                    "condition": "Условие",
                    "leftTitle": "Превосходные критерии",
                    "rightTitle": "Критерии отступа"
                },
                "searchPanes": {
                    "clearMessage": "Очистить всё",
                    "collapse": {
                        "0": "Панели поиска",
                        "_": "Панели поиска (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Нет панелей поиска",
                    "loadMessage": "Загрузка панелей поиска",
                    "title": "Фильтры активны - %d",
                    "showMessage": "Показать все",
                    "collapseMessage": "Скрыть все"
                },
                "thousands": ",",
                "buttons": {
                    "pageLength": {
                        "_": "Показать 10 строк",
                        "-1": "Показать все ряды"
                    },
                    "pdf": "PDF",
                    "print": "Печать",
                    "collection": "Коллекция <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                    "colvis": "Видимость столбцов",
                    "colvisRestore": "Восстановить видимость",
                    "copy": "Копировать",
                    "copyKeys": "Нажмите ctrl or u2318 + C, чтобы скопировать данные таблицы в буфер обмена.  Для отмены, щелкните по сообщению или нажмите escape.",
                    "copySuccess": {
                        "1": "Скопирована 1 ряд в буфер обмена",
                        "_": "Скопировано %ds рядов в буфер обмена"
                    },
                    "copyTitle": "Скопировать в буфер обмена",
                    "csv": "CSV",
                    "excel": "Excel"
                },
                "decimal": ".",
                "infoThousands": ",",
                "autoFill": {
                    "cancel": "Отменить",
                    "fill": "Заполнить все ячейки <i>%d<i><\/i><\/i>",
                    "fillHorizontal": "Заполнить ячейки по горизонтали",
                    "fillVertical": "Заполнить ячейки по вертикали"
                },
                "datetime": {
                    "previous": "Предыдущий",
                    "next": "Следующий",
                    "hours": "Часы",
                    "minutes": "Минуты",
                    "seconds": "Секунды",
                    "unknown": "Неизвестный",
                    "amPm": [
                        "AM",
                        "PM"
                    ],
                    "months": {
                        "0": "Январь",
                        "1": "Февраль",
                        "10": "Ноябрь",
                        "11": "Декабрь",
                        "2": "Март",
                        "3": "Апрель",
                        "4": "Май",
                        "5": "Июнь",
                        "6": "Июль",
                        "7": "Август",
                        "8": "Сентябрь",
                        "9": "Октябрь"
                    },
                    "weekdays": [
                        "Вс",
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб"
                    ]
                },
                "editor": {
                    "close": "Закрыть",
                    "create": {
                        "button": "Новый",
                        "title": "Создать новую запись",
                        "submit": "Создать"
                    },
                    "edit": {
                        "button": "Изменить",
                        "title": "Изменить запись",
                        "submit": "Изменить"
                    },
                    "remove": {
                        "button": "Удалить",
                        "title": "Удалить",
                        "submit": "Удалить",
                        "confirm": {
                            "_": "Вы точно хотите удалить %d строк?",
                            "1": "Вы точно хотите удалить 1 строку?"
                        }
                    },
                    "multi": {
                        "restore": "Отменить изменения",
                        "title": "Несколько значений",
                        "noMulti": "Это поле должно редактироватся отдельно, а не как часть групы"
                    },
                    "error": {
                        "system": "Возникла системная ошибка (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Подробнее<\/a>)"
                    }
                },
                "searchPlaceholder": "Что ищете?",
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        //Date range picker
        $('#reservation').daterangepicker({
            // locale: moment.locale('ru'),
            autoUpdateInput: true,
            startDate: moment().startOf('month'),
            endDate: moment().endOf('month'),
            showDropdowns: true,
            alwaysShowCalendars: true,
            autoApply: true,
            timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss',
                cancelLabel: 'Очистить',
                applyLabel: 'Принять',
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
            },
            ranges: {
                'Сегодня': [moment(), moment()],
                'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Последние 7 дней': [moment().subtract(6, 'days'), moment()],
                'Последние 30 дней': [moment().subtract(29, 'days'), moment()],
                'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
                'Последний месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>
</body>

</html>
