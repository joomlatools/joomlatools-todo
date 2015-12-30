kQuery(function($){

  $('#tasks-form').on('submit', function( event ) {
      if (!$('select[name="tag[]"]').select2("val").length) {
          $(this).find('input[name="tag[]"]').remove();
          $(this).append('<input type="hidden" name="tag" value="" />');
      }
  });

});
