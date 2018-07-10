$(document).ready(function () {
   
    $('.agregar').click(function () {
        var id = $(this).attr('data-id');  
        var nombre = $(this).attr('data-nom');
        var imagen = $(this).attr('data-foto');
        var precio = $(this).attr('data-precio');
        var cant = $("#"+id+" input").val();       
        var categoria = $(this).attr('data-cat');
        var pagina = $(this).attr('data-pag');
        console.log('entre');
        if (cant == '') {
            alertify.error('No Agrego la Cantidad');
        } else {
            $.ajax({
                type: 'POST',
                url: 'php/phpUsuario/aniadirCarrito.php',
                data: { "idart": id, "nombre": nombre, "imagen": imagen, "precio": precio, "cant": cant, "categoria": categoria, "pagina": pagina }
            }).done(function (resultado) {
                alertify.success(resultado);
            });
        }    

    });

    $('#carrito a').click(function () {
        var url=$(this).attr("href");
        $(".mi_galeria").load(url);
          return false;
    });

});