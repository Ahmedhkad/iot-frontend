
 $(document).ready(function(){
//click off class on function
  $(document).on('click', ".ON", function(){
   var task_id = $(this).data('id');
   var details_e = $(this).data('details-id');
   $.ajax({
    url:"up_task_off.php",
    method:"POST",
    data:{task_id:task_id , details_e:details_e},
    success:function(data)
    {
      $('.state-'+task_id).html("<p class='state'>OFF</p>");
      $('#device-'+task_id).toggleClass("ON OFF");
      console.log("click ON!!");
    }
   })
 });  

//click on class off function
  $(document).on('click', ".OFF", function(){
   var task_id = $(this).data('id');
   var details_e = $(this).data('details-id');
   $.ajax({
    url:"up_task_on.php",
    method:"POST",
    data:{task_id:task_id , details_e:details_e},
    success:function(data)
    {
      $('.state-'+task_id).html("<p class='state'>ON</p>");
      $('#device-'+task_id).toggleClass("OFF ON");
      console.log("click OFF!!");
    }
   })
 });


 }); //END of main function