
    
function preguntar(id){
    alertify.confirm('Eliminar Datos', '¿Estas Seguro?', function(){ eliminarDatos(id) }
    , function(){ alertify.error('Cancelar')});
};

function eliminarDatos(id) {
    $.ajax({
        type: 'POST',
        url: 'php/phpUsuario/quitarFila.php',
        data: { 'id': id },
        success: function (r) {
            //   if (r == 1) {
            $('.mi_galeria').load('php/phpUsuario/verCarrito.php');
            alertify.success(r);
        
            //   } else {
            //     alertify.error('Fallo');
            //  }
        }//
    });
};

function enviarPedido(total) {
    $.ajax({
        type: 'POST',
        url: 'php/phpUsuario/enviarPedido.php',
        data: { 'total': total },
        success: function (respuesta) {
         //   alertify.success(respuesta);
            $(".mi_galeria").html(respuesta);
        }
    });
  //  $('.mi_galeria').load('php/phpUsuario/enviarPedido.php');
};



