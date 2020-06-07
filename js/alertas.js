/**
 * inicio alerta login
 * 
 * 
 */
function login(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'El usuario y la contraseña son incorrectos.', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../index.php';  
        });
    });
}
/**
 * fin alerta login
 */

 /**
  * inicio alertas perfil vigilante
  */
function perfilVigilante(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se ingresaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_vigilante.php';  
        });
    });
}

function perfilVigilanteElemetoSinSerial(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se ingresaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/stiker_vigilante.php';  
        });
    });
}

function perfilVigilanteActualizar(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se actualizaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_vigilante.php';  
        });
    });
}

function perfilVigilanteError(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Por favor completa los campos', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_vigilante.php';  
        });
    });
}

function perfilVigilanteErrorElemento(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Ese número serial ya ha sido registrado', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_vigilante.php';  
        });
    });
}

/**
 * fin alertas perfil vigilante
 */

/**
 *inicio alertas perfil usuario 
 */

function perfilUsuario(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se ingresaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_usuario.php';  
        });
    });
}

function perfilUsuarioCompletarDatos(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Por favor completa los campos', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_usuario.php';  
        });
    });
}

function perfilUsuarioActualizar(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se actualizaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_usuario.php';  
        });
    });
}

function perfilUsuarioSerialExiste(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Ese número serial ya ha sido registrado', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_usuario.php';  
        });
    });
}

function perfilUsuarioElemetoSinSerial(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se ingresaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/stiker_usuario.php';  
        });
    });
}

/**
 * fin perfil usuario
 */

/**
 * inicio perfil supervisor
 */

function perfilSupervisor(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se ingresaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

function perfilSupervisorCompletarDatos(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Por favor completa los campos', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

function perfilSupervisorActualizar(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se actualizaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

function perfilSupervisorCompletarDatos(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Por favor completa los campos', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

function perfilSupervisorSerialExiste(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Ese número serial ya ha sido registrado', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

function perfilSupervisorElemetoSinSerial(){ 
    Swal.fire({
        title: 'Muy bien!',
        text: 'Los datos se ingresaron correctamente', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#0097A7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/stiker_super.php';  
        });
    });
}

function perfilSupervisorError(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Ha ocurrido un error', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

function perfilSupervisorClaveDiferente(){ 
    Swal.fire({
        title: 'Ups!',
        text: 'Las contraseñas no son iguales', 
        confirmButtonText: 'Aceptar', 
        confirmButtonColor: '#1ABC9C',
        backdrop: false
    }).then(function(){
        setTimeout(function(){     
            location = '../vistas/perfil_supervisor.php';  
        });
    });
}

/**
 * fin perfil supervisor
 */