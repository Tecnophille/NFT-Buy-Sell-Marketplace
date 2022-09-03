(function($) {
    "use strict";
    $('#slider').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 25,
        responsive: true,
        ajax: $('#table-url').data("url"),
        order: [1, 'desc'],
        autoWidth:false,
        columns: [
            {"data": "coin_type"},
            {"data": "full_name"},
            {"data": "earnings"},
        ]
    });
})(jQuery)
