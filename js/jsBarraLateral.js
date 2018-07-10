$(document).ready(function(e){
    
    $('#menu_toggle2').click(function() {
        $('.nav_bar').toggleClass('section--abrir',500);
        $(this).toggleClass('abrir');
    });

    $(".menu li:has(ul)").click(function (e) { /*al decir li:has(ul) significa que estoy 
        accediendo a las etiquetas li que contengan una etiqueta ul, es decir submenues*/ 
        e.preventDefault(); /*esto evita que se recargue la pagina*/ 

        if ($(this).hasClass("activado")) {
            $(this).removeClass("activado");
            $(this).children("ul").slideUp();
        } else {
            $(".menu li ul").slideUp();
            $(".menu li").removeClass("activado");
            $(this).addClass("activado");
            $(this).children("ul").slideDown();
        }
    });

    $(window).resize(function () { /*que cuando cambie de tamaño de pantalla ejecute la function*/ 

     /*   if ($(document).width() > 800) {
            $(".nav_bar").css({"positon" : "absolute"});
        }*/

        if ($(document).width() < 800) {
        /*    $(".nav_bar").css({"clip-path" : "circle(0px at top left)"});*/
            $(".menu li ul").slideUp(); 
            $(".menu li").removeClass("activado");
        }
    });

    $(".nav_bar .menu li ul li a").click(function(e){      
        var categoria=$(this).attr("data-value");
        $.post("php/galeria.php", { categoria: categoria}, function(data){
                   $(".mi_galeria").html(data);                      
        });
        
        return false;
            
    });
});