
$(function() {
			 $('.messagePic img').corner('5px');
			  $('.send_button').corner('4px');
			 
		 
		 $('#search_view').hide();
	$(input).submit(function(){
		
			$('#container-1').hide();
			$('#search_view').show();
		  
		});
});
function onDelete()
	{
		if(confirm('Do you want to delete ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
checked=false;
function checkedAll (form_1) {
	var aa= document.getElementById(form_1);
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }
