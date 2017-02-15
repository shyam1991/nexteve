
$(document).ready(function()
{
	$(".search_event").click(function(){
		
		var search_data = $('.search-data').val();
		data= {'search-data' : search_data};
	    $.ajax
	    			({
				    	url 		: 'process.php',
				    	type 		: 'post',
				    	data 		: data,
				    	//dataType 	: 'json',	    
						success: function(data)
							{
								
									
								$('.first_page').hide();
								$('.eventlist').html(data);
							}
		});
	});

});
