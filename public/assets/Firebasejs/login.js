// FUNCIÓN PARA EL LOGIN
function login(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    firebase.auth().signInWithEmailAndPassword(email, password)
    .catch(function (error) {
        Swal.fire({
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            title: "Error",
            text: "E-mail y/o Clave incorrecta",
        });

    });
}

// FUNCIÓN PARA MANEJAR LAS SESIONES
function sesiones() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            //var email = user.email;
            window.location = "dashboard";
        }
    });
}

sesiones();