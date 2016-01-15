kQuery(function($){

  $('#tasks-form').on('submit', function( event ) {
      $(this).find('input[name="tag[]"]').remove();
      if (!$('select[name="tag[]"]').select2("val").length) {
          $(this).append('<input type="hidden" name="tag" value="" />');
      }
  });

});
