// FUNCIÓN PARA CERRAR SESIÓN
function logout() {
    firebase.auth().signOut()
    
    .then(function(){
        Swal.fire({
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            title: "Alerta",
            text: "Sesión Cerrada!",
        });
        window.location = "/"
    })

    .catch(function(error){
        Swal.fire({
            icon: 'danger',
            showCancelButton: false,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            title: "Error",
            text: "Ocurrió un error al cerrar la sesión",
        });
        window.location = "/"
    });
}