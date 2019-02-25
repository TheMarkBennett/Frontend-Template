


acf.add_action('ready', function( $el ){

	// $el will be equivalent to $('body')

	// find a specific field
	var field = $('#acf-field_5c70e9dadff60');
  var selected = $('#acf-field_5c70e9dadff60 option:selected').val();

      //console.log($selected);

 update_pages_on_change(e, selected);

});


$('#acf-field_5c70e9dadff60').change(function(e) {
  var selected = $('#acf-field_5c70e9dadff60 option:selected').val();
  //console.log($selected);
  update_pages_on_change(e, selected);
});



function update_pages_on_change(e, selected){
  // if (this.request) {
  // 			// if a recent request has been made abort it
  // 			this.request.abort();
  // 		}
   $('#acf-field_5c710f16c0868').find('option').remove().end();
 var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
  var post_type = selected;
  console.log(post_type);

  $.post(ajaxUrl, {
            action:"more_post_ajax",
            post_type: selected,
        }).success(function(posts){
            page++;
            $("#acf-field_5c710f16c0868").append(posts); // CHANGE THIS!
        });





}
