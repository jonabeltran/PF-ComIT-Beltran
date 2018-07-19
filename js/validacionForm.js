function validar() {
    var nombres=$("#nombres").val();
    var email=$("#email").val();
    var tel=$("#tel").val();
    var dire=$("#dire").val();
    var pass=$("#pass").val();
    var psw = $("#psw").val();

    var expresion= /\w+@\w+\.+[a-z]/;
    
    if (nombres === "" || email === "" || tel === "" || dire === "" || pass === "" || psw === "") {
        alertify.error("Existen Campos Vacios");
        return false;
    } else if (nombres.length > 20) {
        alertify.error("Nombres muy Largos");
        return false;
    } else if (!expresion.test(email)){
        alertify.error("Email Incorrecto");
        return false;
    } else if (isNaN(tel)) {
        alertify.error("Telefono Incorrecto");
        return false;
    } else if (pass != psw) {
        alertify.error("Las Constraseñas no son Iguales");
        return false;
    } 
}