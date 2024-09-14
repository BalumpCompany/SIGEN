function verifMayus(letra) {
    return letra === letra.toUpperCase();
}

function verificarDatos() {
    let string = "";
    let mayus = false;
    if (document.forms["cuadroRegistro"]["pass"].value.length < 8) {
        alert("Contraseña muy corta, debe tener mínimo 8 caracteres");
        return false;
    } else if (document.forms["cuadroRegistro"]["pass"].value != document.forms["cuadroRegistro"]["pass2"].value) {
        alert("Las contraseñas no coinciden");
        return false;
    } else {
        if (document.forms["cuadroRegistro"]["mail"].value == "") {
            string += "mail, ";
        }
        if (document.forms["cuadroRegistro"]["user"].value == "") {
            string += "usuario, ";
        }
        if (document.forms["cuadroRegistro"]["nom"].value == "") {
            string += "nombre, ";
        }
        if (document.forms["cuadroRegistro"]["ape"].value == "") {
            string += "apellido, ";
        }
        if (document.forms["cuadroRegistro"]["pass"].value == "") {
            string += "contraseña, ";
        }
        if (string != "") {
            alert(string + "vacío/s");
            return false;
        }
        if (document.forms["cuadroRegistro"]["pass"].value.match(/[A-Z]/)) {
            mayus = true;
        }
        if (mayus == false) {
            alert("La contraseña debe contener al menos un caracter mayúsucula.");
            return false;
        }
        if (string == "" && mayus == true) {
            alert("Datos ingresados válidos, continuando con el registro.");
            return true;
        }
    }
}