function confirmar() {
    var respuesta = confirm("Seguro de que quieres Eliminar el registro?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}