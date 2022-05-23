/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/darkside.js ***!
  \****************************************/
$(document).ready(function () {
  /* DarkSide -> add page -> Initialiete tinymce for content textarea */
  tinymce.init({
    selector: 'textarea',
    plugins: ['advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount'],
    toolbar: 'undo redo | blocks | ' + 'bold italic strikethrough forecolor backcolor | alignleft aligncenter ' + 'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat blockquote | image media | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });
  /* DarkSide -> archive pages -> context menu */

  $('.pages_archive table tbody tr').on('contextmenu', function (e) {
    var top = e.pageY - 10;
    var left = e.pageX - 90;
    $("#page_edit-context").css({
      display: "block",
      top: top,
      left: left
    }).addClass("show");
    return false; //blocks default Webbrowser right click menu
  });
  $('.general_container').click(function () {
    // if( !$(this).closest('.pages_archive').length > 0 ) $("#page_edit-context").removeClass("show").hide();
    $("#page_edit-context").removeClass("show").hide();
  });
});
/******/ })()
;