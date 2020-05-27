jQuery( document ).ready(function() {
    console.log( "ready!" );

jQuery("#sec1v").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec1v";jaxit( btn_id );
//        jQuery.ajax({
//            url : apfm_ajax.ajax_url,
//            type : 'post',
//            data : {
//                action : 'extractprocess',
//                post_id : btn_id
//            },
//            success : function( response ) {
//                jQuery('#extractview').html(response);
//            }
//        });

    }); 

jQuery("#sec1V").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec1V";jaxit( btn_id );
    }); 
	
jQuery("#sec1p").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec1p";jaxit( btn_id );
    }); 

jQuery("#sec1d").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec1d";jaxit( btn_id );
    }); 


jQuery("#sec0c").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec0c";jaxit( btn_id );
    }); 


jQuery("#sec1c").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec1c";jaxit( btn_id );
    }); 


jQuery("#sec2v").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec2v";jaxit( btn_id );
    }); 

jQuery("#sec2V").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec2V";jaxit( btn_id );
    }); 

jQuery("#sec2p").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec2p";jaxit( btn_id );
    }); 

jQuery("#sec2d").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec2d";jaxit( btn_id );
    }); 




jQuery("#sec3v").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec3v";jaxit( btn_id );
    }); 
    
    jQuery("#sec3V").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec3V";jaxit( btn_id );
    });     

jQuery("#sec3p").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec3p";jaxit( btn_id );
    }); 

jQuery("#sec3d").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec3d";jaxit( btn_id );
    }); 




jQuery("#sec4v").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec4v";jaxit( btn_id );
    }); 
    
 jQuery("#sec4V").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec4V";jaxit( btn_id );
    }); 

jQuery("#sec4p").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec4p";jaxit( btn_id );
    }); 

jQuery("#sec4d").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var btn_id = "sec4d";jaxit( btn_id );
    }); 




//New version of ajax  ccallback
//$("#extractview").html("TablePress database extract and process for Jaxslider.");   
function jaxit( btn_id ) {
    
   var formOk = true;
    
  jQuery.ajax({
    url:apfmajax_object.ajaxapfm_url,
                type:'POST',
                data: "action=extractprocess&post_id="+btn_id+"&if_ajaxid=005",
                cache: false,
    success:function(response){   
               if(response!="false"){
               jQuery('#extractview').html(response);
                }
                }
   });

}




});




