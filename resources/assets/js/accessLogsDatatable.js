$('#ip, #email').donetyping(function() {
    window.LaravelDataTables['accesslog-table'].draw();
});

$('#access_select').change(function () {
    window.LaravelDataTables['accesslog-table'].draw();
});
