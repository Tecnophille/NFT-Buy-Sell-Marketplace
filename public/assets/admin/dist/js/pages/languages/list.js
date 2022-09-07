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
            {"data": "name"},
            {"data": "prefix"},
            {"data": "direction"},
            {"data": "action",orderable: false, searchable: false}
        ]
    });
})(jQuery)
