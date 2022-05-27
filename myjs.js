	$(document).ready(function() {

	  	$("#search-submit").click(function() {

	   	$("#response").empty();
			$.ajax(
				{
						url     : post_url,
						type    : 'POST',
						dataType: 'json',
						cache: false,
						data    : $('#search-form').serialize(),
						success: function( data ) {
									$("#response").append(data['success']);
								},
						error: function( data ){
									//
								}
				});
	    form.addClass('was-validated');
	  })

		var myArr = [];





	});
