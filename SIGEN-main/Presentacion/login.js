function verificarDatos() {
    let string = "";
    if (document.forms["cuadroLogin"]["user"].value == "") {
        string += "usuario, ";
    }
    if (document.forms["cuadroLogin"]["pass"].value == "") {
        string += "contraseña, ";
    }
    if (string != "") {
        alert(string + "vacío/s");
        return false;
    } else {
        alert("Datos ingresados válidos, comprobando.");
        return true;
    }
}