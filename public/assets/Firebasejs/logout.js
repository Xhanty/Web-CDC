// FUNCIÓN PARA CERRAR SESIÓN
function logout() {
    firebase.auth().signOut()
    
    .then(function(){
        swal({
            title: "Alerta",
            text: "Sesión Cerrada!",
        });
        window.location = "/"
    })

    .catch(function(error){
        swal({
            title: "Error",
            text: "Ocurrió un error al cerrar la sesión",
        });
    });
}