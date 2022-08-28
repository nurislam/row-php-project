// JavaScript Document
/*
 +--------------------------------------------------------------------------------------------
 | File     : Ajax.js
 | Author   : Mazhar Ahmed
 | Created  : 2010-02-18
 | Platform : jQuery is a must
 | Desc.    : this will make the ajax request for and show by animating
 | Comments : Hoorraay, I did it again
 |            Today our exam is over, Yahoo
 +--------------------------------------------------------------------------------------------
 */

/**
 * it will make the request
 * you have to hide the loading and failed content at start
 * @name makeRequest
 * @author Mazhar Ahmed
 *
 * @parameter
 * serverPage => the server page you want to get of post
 * method => get / post
 * parameters => string of variables like a=1&b=2&c=3
 * objID => the content in main page where the return data will be
 * animID => the content which contains the loading animation
 * failID => the content witch contains the failed message
 *
 * @example
 * makeRequest ('demo.php', 'post', 'a=1&b=2&c=3', '#loader', '#loading', '#failed');
 * minimal:
 * makeRequest ('login.php');
 *
 * @return the response in the decided content
 */
function makeRequest (serverPage, method, parameters, objID, animID, failID)
{
	// set the default method
	if (method == null)
	{
		method = 'get';
	}
	
	// set the default contents
	// set the default loader
	if (objID == null)
	{
		objID = '#loader';
	}
	
	// set the default loading animation
	if (animID == null)
	{
		animID = '#loading';
	}
	
	// set the default failed message container
	if (failID == null)
	{
		failID = '#failed';
	}
	
	// hide the fail and loader content
	$(failID).hide ("fast");
	$(objID).slideUp ("slow");
	
	$.ajax ({
		
		// setting the configuration
		// setting method
		method: method,
		// setting the type
		type: method,
		// setting the url
		url: serverPage,
		// setting the data
		data: parameters,
		// setting the timeout
		timeout: 5000,
		
		// show loading just when link is clicked
		beforeSend: function (){$(animID).show ("fast");},
		
		// stop showing loading when the process is complete
		complete: function (){ $(animID).hide("fast");},
		
		// so, if data is retrieved, store it in html
		success: function (html){
			
			//show the response html
			$(objID).html (html);
			
			// animation
			$(objID).show ("slow");
			
		},
		
		// if any error occured
		error: function (XHR, textStatus, errorThrown)
		{
			$(failID).show ("fast");
		}
	})
}


/**
 * it will send the form data using ajax function makeRequest
 * 
 * @name sendForm
 * @author Mazhar Ahmed
 * @parameter
 * form => the target form content in the page
 * objID => the content in main page where the return data will be
 * animID => the content which contains the loading animation
 * failID => the content witch contains the failed message
 *
 * @example
 * sendForm ('#form', '#loader', '#loading', '#failed');
 * minimal:
 * sendForm ();
 *
 * @return the response in the decided content
 */
function sendForm(form, objID, animID, failID)
{
	// setting the default form
	if (form == null)
	{
		form = '#form';
	}
	
	// sending by grabing the target, method, and values from the form
	// passing the other values got by parameter sequentially
	makeRequest ($(form).attr('action'), $(form).attr('method'), $(form).serialize(), objID, animID, failID);
}

/*
$(document).ready(function(){
	 Nifty("#menu a","small top transparent");
	 Nifty("#outcontent","medium bottom transparent");
	 $('.content').load('boo.php');	//by default initally load text from boo.php
         $('#menu a').click(function() { //start function when any link is clicked
		 				$(".content").slideUp("slow");
						 var content_show = $(this).attr("title"); //retrieve title of link so we can compare with php file
							$.ajax({
							method: "get",url: "boo.php",data: "page="+content_show,
							beforeSend: function(){$("#loading").show("fast");}, //show loading just when link is clicked
							complete: function(){ $("#loading").hide("fast");}, //stop showing loading when the process is complete
							success: function(html){ //so, if data is retrieved, store it in html
							$(".content").show("slow"); //animation
							$(".content").html(html); //show the html inside .content div
					 }
				 }); //close $.ajax(
         }); //close click(
 }); //close $(
*/