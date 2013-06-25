/************************************************************/
/*Animation javascript pour le site TEDx Lausanne*/
/*Groupe 143/dreamteam/projet_mi*/
/************************************************************/
$(document).ready(function(){


/**********************************************/
/* Animation event_single.tpl*/
/**********************************************/

   $(".events_single_infos").show();
   $(".events_single_details").hide();
   $(".events_single_speakers").hide();

  $(".events_single .event_info").click(function(){
   $(".events_single_infos").delay(500).fadeIn();
   $(".events_single_details").fadeOut(500);
   $(".events_single_speakers").fadeOut(500);
  });


  $(".events_single .event_details").click(function(){
   $(".events_single_details").delay(500).fadeIn();
   $(".events_single_infos").fadeOut(500);
   $(".events_single_speakers").fadeOut(500);
  });
  
  
    $(".events_single .event_speakers").click(function(){
    $(".events_single_speakers").delay(500).fadeIn();
    $(".events_single_details").fadeOut(500);
    $(".events_single_infos").fadeOut(500);
  });
  
  







/************************************************************/
});