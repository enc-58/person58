 $(document).ready(function(){
	
	jFormValidator={
				DIGITS_ALLOWED : true,
				DIGITS_DENIED : false,
		
			  'check_and_warning' : function (checked_id, min_length_value, data_type) {
						$('body').append('<div id="warning_div" class="information_block"></div');
						var warn_div=$('#warning_div');
						var checking_textbox=$(checked_id);
						var checking_textbox_position=checking_textbox.offset();
						warn_div.css({
										top: checking_textbox_position.top-3,
										left: checking_textbox_position.left+checking_textbox.width()+15
						});
					
						var pattern_not_cyrillic=/[^А-яЁё\s]+/i;
						
						if((pattern_not_cyrillic.test(checking_textbox.val())) && (data_type==jFormValidator.DIGITS_DENIED)){
										 jFormValidator.error_is_found=true;
										 warn_div.removeClass('block_show_correct').addClass('block_show_error').html("← некириллические символы недопустимы ").show();													
										 checking_textbox.removeClass('element_is_normal').addClass('element_is_wrong');
						}
						else {
									if (checking_textbox.val().length<min_length_value){
										 jFormValidator.error_is_found=true;
										 warn_div.removeClass('block_show_correct').addClass('block_show_error').html("← слишком мало символов: нужно не менее "+min_length_value).show();													
										 checking_textbox.removeClass('element_is_normal').addClass('element_is_wrong');
									} 
									else{
										warn_div.removeClass('block_show_error').addClass('block_show_correct').html("√").show();													
										checking_textbox.removeClass('element_is_wrong').addClass('element_is_normal');
									};
						}
				
			    },
			  	'check_name' : function() {
											jFormValidator.check_and_warning('#person_name',3,jFormValidator.DIGITS_DENIED);
				},
				'check_short_description' : function() {
														jFormValidator.check_and_warning('#brief',20,jFormValidator.DIGITS_ALLOWED);
				},
				'check_keywords' : function() {
													jFormValidator.check_and_warning('#keywords',20,jFormValidator.DIGITS_ALLOWED);
				},
				'check_file_article' : function() {
													$('body').append('<div id="articleInfo" class="information_block"></div');
													var file_article_info_div=$('#articleInfo');		
													var file_article_element=$('#article');
													var file_article_element_position = file_article_element.offset();		
													file_article_info_div.css({
																				top: file_article_element_position.top-3,
																				left: file_article_element_position.left+file_article_element.width()+15
																			  });		
												//	var article_pathfile_pattern=/^[A-Z]{1}:\\([A-ZА-я.0-9!@()\\_\s:]*)$/i;
												var article_pathfile_pattern=/^[\.\w:\\\sА-яЁё]*$/i;
												if (!article_pathfile_pattern.test(file_article_element.val())){
													 jFormValidator.error_is_found=true;
													 file_article_info_div.removeClass('block_show_correct').addClass('block_show_error').html("не соответствует шаблону").show();													
													 file_article_element.removeClass('element_is_normal').addClass('element_is_wrong');
												} 
												else{
													 file_article_info_div.removeClass('block_show_error').addClass('block_show_correct').html("√").show();													
													 file_article_element.removeClass('element_is_wrong').addClass('element_is_normal');
												}
				},
	
				'send_Values' : function()  { 
												if (!jFormValidator.error_is_found) {
														$('#jform').submit();
											 		};
				}
	};
	
	
	
	$('#send').click(
		function (){
				 		var obj = $.browser.webkit ? $('body'): $('html');
				 		obj.animate({ scrollTop: $('#jform').offset().top }, 750, function  (){
						   jFormValidator.error_is_found=false;
						   jFormValidator.check_name();
						   jFormValidator.check_short_description();
						   jFormValidator.check_file_article();
					  //   jFormValidator.check_file_photo();
						   jFormValidator.check_keywords();
						   jFormValidator.send_Values();
						 });
	   return false;		
	});
	// bind all functions 
	$('#person_name').change(jFormValidator.check_name);
	$('#brief').change(jFormValidator.check_short_description);
	$('#article').change(jFormValidator.check_file_article);
//	$('#photo').change(jFormValidator.check_file_photo);
	$('#keywords').change(jFormValidator.check_keywords);
});
