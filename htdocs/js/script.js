/************************************************************/
/*Animation javascript pour le site TEDx Lausanne*/
/*Groupe 143/dreamteam/projet_mi*/
/************************************************************/
$(document).ready(function(){


/**********************************************/
/* Animation event_single.tpl*/
/* Changement des onglets infos, détails et 
 * speakers.
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
  
  
  
  
  
  /**********************************************/
/* Animation event_single.tpl*/
/* Changement des événements*/
/**********************************************/

/**
 *Initialisation du compteur d'events
 */

var currentEvent = 1;
var nbEvents = $(".events>.events_single").length;


/**
 *Cachage de tous les events
 */

$(".events .events_single").hide();


/**
 *Affichage du dernier events_single en fonction de son ordre dans la balise 
 *article ayant la classe .events 
 *l'events en premier de liste est le plus récent
 */

$(".events .events_single:nth-child("+currentEvent+")").show();


/**
 *fonctions d'apparitions des boutons previous et next
 *aux moments opportuns
 */
function displayButton(){
    switch (currentEvent)
    {
    case 1:
      $(".events_nav .previous").hide();
    break;
    case nbEvents:
      $(".events_nav .next").hide();
    break;
    default:
      $(".events_nav .next").show();
      $(".events_nav .previous").show();
    }
}


/**
 *Initialisation des bouttons
 */
displayButton();

        
        
/**
 *Bouton précédent
 */        
        
$(".events_nav .previous").click(function(){
     if(currentEvent>1){
             $(".events_single:nth-child("+currentEvent+")").animate({right:'250px'});
             $(".events_single:nth-child("+currentEvent+")").fadeOut(500);
             currentEvent-=1;
             $(".events_single:nth-child("+currentEvent+")").delay(1000).fadeIn();
             $(".events_single:nth-child("+currentEvent+")").animate({right:'250px'});
             displayButton();
    }
});


/**
 *Bouton suivant
 */

$(".events_nav .next").click(function(){
    if(currentEvent<nbEvents){
            $(".events_single:nth-child("+currentEvent+")").animate({left:'250px'});
            $(".events_single:nth-child("+currentEvent+")").fadeOut(500);
            currentEvent+=1;
            $(".events_single:nth-child("+currentEvent+")").delay(1000).fadeIn();
            $(".events_single:nth-child("+currentEvent+")").animate({right:'250px'});
            displayButton();
    }
});






/************************************************************/
});