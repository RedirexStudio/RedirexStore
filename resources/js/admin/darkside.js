const { forEach } = require("lodash");


require('./modules/nice-select.js')
require('./modules/nice-select-search.js')

$.fn.disableSelection = function() {
  return this
           .attr('unselectable', 'on')
           .css('user-select', 'none')
           .on('selectstart', false);
};

function debounce(callback, delay) {
  var timeout
  return function() {
    var args = arguments
    clearTimeout(timeout)
    timeout = setTimeout(function() {
      callback.apply(this, args)
    }.bind(this), delay)
  }
}

$(document).disableSelection().ready(()=>{
  /* DarkSide -> add page -> Initialiete tinymce for content textarea */
  tinymce.init({
    selector: 'textarea',
    setup: function(editor) {
      editor.on('keyup keydown', function(e) {
        if(e.ctrlKey && e.which == 83){
          e.preventDefault()
          $('#content > form').submit()
        }
      })
    },
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
    'bold italic strikethrough forecolor backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat blockquote | image media | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });
    

  /* DarkSide -> archive pages -> context menu */
  $('.pages_archive table tbody tr').on('contextmenu', function(e){
    var top = e.pageY - 10;
    var left = e.pageX - 90;
    var open_url = $(this).attr('open_url');
    var edit_url = $(this).attr('update_url');
    var delete_url = $(this).attr('delete_url');
    $("#page_edit-context a.open_page").attr('href', open_url);
    $("#page_edit-context a.edit").attr('href', edit_url);
    $("#page_edit-context a.remove").attr('href', delete_url);
    $("#page_edit-context").css({
      display: "block",
      top: top,
      left: left
    }).addClass("show");
    return false; //blocks default Webbrowser right click menu
  });
  $('.general_container').click(function(){
    $("#page_edit-context").removeClass("show").hide();
  });
  $('.general_container').on('click', '#page_edit-context a[href="#"]', ()=>{
    return false
  })

  /* DarkSide -> archive pages -> select pages row */
    /* Multiple Selecting by Shift */
      var $pages_rows = $('.pages_archive > table > tbody > tr')
      var lastChecked = null
      const SELECTED_COLOR = '#b2ebf2'

      $pages_rows.click(function(e) {
          $(this).css('background-color', ($(this).find('.selected_pages').prop('checked') ? 'unset' : SELECTED_COLOR )).find('.selected_pages').prop('checked', (!$(this).find('.selected_pages').prop('checked')))
          if(!lastChecked) {
              lastChecked = this;
              return;
          }
          if(e.shiftKey) {
              var start = $pages_rows.index(this);
              var end = $pages_rows.index(lastChecked);
              $pages_rows.find('.selected_pages').slice(Math.min(start,end), Math.max(start,end)+ 1).prop('checked', ($(this).find('.selected_pages').prop('checked')))
              $pages_rows.slice(Math.min(start,end), Math.max(start,end)+ 1).css('background-color', ($(this).find('.selected_pages').prop('checked') ? SELECTED_COLOR : 'unset' ))
          }
          lastChecked = this;
      })

  /* DarkSide -> edit page -> bind ctrl+s */
    $(document).bind("keyup keydown", function(e){
      if(e.ctrlKey && e.which == 83){
          e.preventDefault()
          $('#content > form#page_form').submit()
      }
    })

  /* DarkSide -> archive pages -> enter to edit page by doubleclick */
    $('.pages_archive table tbody tr').dblclick(function() {
      var edit_url = $(this).attr('update_url');
      location.href = edit_url
    })

  /* DarkSide -> Output pages request */
      $(document).on('keyup', '#parent_page_source', function() {
        if( $(this).val().length > 3 ) $('.search_page_box .nice-select-search-box .spinner-grow').css('display', 'block')
      })
      $(document).on('keyup', '#parent_page_source', debounce(function() {
        $('input[name="parent_page"]').val($('#parent_page_source').val())
        if( $('input[name="parent_page"]').val().length > 3 ){
          $('.search_page_box .list .option:not(.disabled)').remove()

          let token = $('#search_pages input[name="_token"]').val()
          let data = $("#search_pages").serialize()

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
          });
          $.ajax({
            url: $('form#search_pages').attr('action'),
            type: 'post',
            data: data,

            success: function success(data) { console.log(data)
              data.forEach(function(el){
                $('.search_page_box .list').append('<li data-value="' +el.id+ '" class="option">' +el.title+ '</li>')
              })
              $('.search_page_box .nice-select-search-box .spinner-grow').css('display', 'none')
            },
            error: function error(error) {
              console.log(error)
            }
          });
        }
      }, 1500))
    // })

  /* Initializate Nice Select */
  $('select').niceSelect()
})