$(document).ready(function()
{ 
  
  $(document).on('click','#reg_agreement',function(e)
  {
    if ($(this).is(':checked')) 
    {
      $('#btn-proceed-reg').removeClass('disabled');
      
    } 
    else 
    {
      $('#btn-proceed-reg').addClass('disabled');
    }
   

  });

});
