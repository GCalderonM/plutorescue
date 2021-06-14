const Swal = require("sweetalert2");

function shortPost(url, data, oTable = false) {
    $.post(url, data)
        .done(function(response) {
            toastr.success(response.message);
            if (oTable) {
                $('.buttons-reload').click();
            }
        })
        .fail(function(response) {
            toastr.error(response.responseJSON.message);
        })
        .always(function() {

        });
}

$('#announces-table').on('click', '.delete-announce', function () {
    let url = $(this).data('href');

    Swal.fire({
        title: Lang.get('global.confirm-question'),
        text: Lang.get('global.confirm-notice'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: Lang.get('global.continue'),
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ml-1'
        },
        cancelButtonText: Lang.get('global.cancel'),
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            shortPost(url, { _method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content') }, true);
        }
    })
});

$('#username, #title').donetyping(function() {
    window.LaravelDataTables['announces-table'].draw();
});

$('#announce_status, #animal_type, #animal_gender, #announces_softDelete').change(function () {
    window.LaravelDataTables['announces-table'].draw();
});

$('#delete_filters').click(function () {
    $('#username').val();
    $('#title').val();
    $('#announce_status').val('');
    $('#animal_type').val('');
    $('#animal_gender').val('');
    window.LaravelDataTables['announces-table'].draw();
});
