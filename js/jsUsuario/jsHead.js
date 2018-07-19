$(document).ready(function (e) {
   
    $('.menu-toggle').click(function() {
        $('.menu_principal').toggleClass('menu--open', 500);
        $(this).toggleClass('open');
     });

  /*  $(".submenu").click(function (e) {   
        $(this).children("ul").slideToggle();//interupto de slideUp y slideDown
    });*/
    
    $('.menu_principal ul li:has(ul)').click(function (e) {
        e.preventDefault();
        if ($(document).width() < 800) {
            if ($(this).hasClass('activado')) {
                $(this).removeClass('activado');
                $(this).children('ul').slideUp();
            } else {
                $('.menu_principal ul li ul').slideUp();
                $('.menu_principal ul li').removeClass('activado');
                $(this).addClass('activado');
                $(this).children('ul').slideDown();
            }
        } 
    });

   /* $("ul").click(function (e) {   
        e.stopPropagation();//--evita que al hacer click en el submenu haga el switch
    });*/
    

    $(".menu_principal a").click(function(e){
        var url = $(this).attr("href");
        if (url != "#") {
            if (url != "php/phpUsuario/cerrarSesion.php") {
                $(".mi_galeria").load(url);
                return false;
            } else {
              
                location.href = url; 
            }  
        }
        
          
    });
   

});