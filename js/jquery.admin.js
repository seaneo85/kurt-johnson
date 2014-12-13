(function($) {
  "use strict";

 jQuery(document).ready( function($){
	//verify
	$(document).on("click", ".verify-themeforest", function(){
		var username = $("#themeforest_name-text").val();
		var api_key  = $("#themeforest_api-text").val();
		var success  = { 'border-color': 'rgba(65, 145, 62, .8)',
						 'outline': 'thin dotted 9',
						 '-webkit-box-shadow': ' rgba(0, 0, 0, 0.0745098) 0px 1px 1px inset, rgba(65, 145, 62, .5) 0px 0px 8px',
						 '-moz-box-shadow': ' rgba(0, 0, 0, 0.0745098) 0px 1px 1px inset, rgba(65, 145, 62, .5) 0px 0px 8px',
						 'box-shadow': ' rgba(0, 0, 0, 0.0745098) 0px 1px 1px inset, rgba(65, 145, 62, .5) 0px 0px 8px'
						}
		var failure  = { 'border-color': 'rgba(255, 0, 0, 0.8)',
						 'outline': 'thin dotted 9',
						 '-webkit-box-shadow': 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)',
						 '-moz-box-shadow': 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)',
						 'box-shadow': 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)'
						}				 
		
		$.post(
			ajax_variables.ajaxurl, 
			{ action: "themeforest_check",  url: "http://marketplace.envato.com/api/v3/" + (username ? username : "blank") + "/" + (api_key ? api_key : "blank") + "/vitals.json" }
		).done(function(data) {
			if(data == "success"){
				$("input[name*='themeforest_name']").css( success );
				$("input[name*='themeforest_api']").css( success );
			} else {
				$("input[name*='themeforest_name']").css( failure );
				$("input[name*='themeforest_api']").css( failure );			  
			}
		});
	});
	
	
	 
	 $(".call_to_action").change( function(){
		 var checked = this.checked;
		 
		 if(checked){
			 $(".call_to_action_form").slideDown();
		 } else {
			 $(".call_to_action_form").slideUp();
		 }
	 });
});
})(jQuery);