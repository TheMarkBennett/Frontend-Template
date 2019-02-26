


acf.add_action('ready', function( $el ){

	// $el will be equivalent to $('body')

	// find a specific field
	var field = $('#acf-field_5c70e9dadff60');
  var $selected = $('#acf-field_5c70e9dadff60 option:selected').val();

      //console.log($selected);

 update_pages_on_change($selected);

});


$('#acf-field_5c70e9dadff60').change(function() {
  var $selected = $('#acf-field_5c70e9dadff60 option:selected').val();
  //console.log($selected);
  update_pages_on_change($selected);
});



function update_pages_on_change($selected){
  // if (this.request) {
  // 			// if a recent request has been made abort it
  // 			this.request.abort();
  // 		}
   $('#acf-field_5c710f16c0868').find('option').remove().end();

  var $post_type = $selected;
  //console.log(post_type); cpt_template-admin-js

	$.ajax({
			 url: ajaxurl,
			 type: 'post',
			 data: {
					 'action':'more_post_ajax',
					 'post_type': $post_type
			 },
			 success: function( response ) {
					 console.log(response);
					 $('#acf-field_5c710f16c0868').append(response)
			 },
	 });

  // $.post(ajaxUrl, {
  //           action:"more_post_ajax",
  //           post_type: selected,
  //       }).success(function(posts){
	// 				console.log(working);
	//
  //           $("#acf-field_5c710f16c0868").append(posts); // CHANGE THIS!
  //       });





}
