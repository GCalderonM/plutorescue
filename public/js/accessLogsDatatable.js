/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/accessLogsDatatable.js ***!
  \****************************************************/
$('#ip, #email').donetyping(function () {
  window.LaravelDataTables['accesslog-table'].draw();
});
$('#access_select').change(function () {
  window.LaravelDataTables['accesslog-table'].draw();
});
/******/ })()
;