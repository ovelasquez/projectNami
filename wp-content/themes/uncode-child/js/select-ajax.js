/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function anclar() {
//    var strAncla = ".lp-form"; //id del ancla
//    alert(jQuery(strAncla).offset().top)
//    jQuery('body,html').stop(true, true).animate({
//        scrollTop: jQuery(strAncla).offset().top-70
//    }, 2000);
}

(function ($) {
    var urlMed = '';
    jQuery("select[name='menu-652']").change(function () {
        var id = jQuery(this).val();
        jQuery.ajax({
            url: uc_vars.ajaxurl,
            type: 'post',
            data: {
                action: 'loadspecialists',
                id_post: id
            },
            beforeSend: function () {
                //link.html('Cargando ...');
                $("select[name='menu-223']").html("<option>" + 'Cargando especialistas...' + "</option>").prop("disabled", "disabled");
            },
            success: function (resultado) {
                $("select[name='menu-223']").html("<option>" + 'Seleccione especialista' + "</option>");
                $("select[name='menu-223']").append(resultado).prop("disabled", "");
                //alert(resultado);
                //$("select[name='menu-223']").before( "<p>"+resultado+"</p>" );
            }

        });
    });

    jQuery("select[name='menu-223']").change(function () {
        urlMed = jQuery(this).val();
        //window.location.href = url;
    });

    jQuery("#btnLpSel").click(function () {
        jQuery(".wpcf7-not-valid-tip").remove();
        if (urlMed !== '') {
            window.location.href = urlMed;
        } else {
            jQuery("select[name='menu-223']").after('<span role="alert" class="wpcf7-not-valid-tip">Seleccione un especialista.</span>');
        }
        event.preventDefault();
    });

    jQuery("#btnLpCrm").click(function (event) {               
//        jQuery(".lp-form").hide();
//        jQuery(".lp-gracias").removeClass("hide").show();
        //event.preventDefault();
    });

    jQuery(".btn-sel-esp").click(function (e) {
        e.preventDefault();		//evitar el eventos del enlace normal
       
        var strAncla = '.lp-sep'; //id del ancla        
        jQuery('body,html').stop(true, true).animate({
            scrollTop: jQuery(strAncla).offset().top 
        }, 2000);     
        jQuery('.lp-form').hide().removeClass('hide').delay(500).show(1000, 'swing', anclar);
        
        jQuery(".lp-gracias").addClass('hide').hide();
             
        return false;
        
    });
    
    jQuery(".wpcf7-form-control").prop("required","required");


})(jQuery);

