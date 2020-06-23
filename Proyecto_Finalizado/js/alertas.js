/**
 * Inicio alertas perfil vigilante
 */
    function perfilVigilante(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){  
            /**
             *  lo direcciona a la vista del perfil_vigilante.php
             */
            location = '../vistas/perfil_vigilante.php';  
            
        });
    }
    function perfilVigilanteElemetoSinSerial(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo insertar_sin_serial_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){  
            /**
             *  lo direcciona a la vista del stiker_vigilante.php
             */
            location = '../vistas/stiker_vigilante.php';  
        });
    }
    function perfilVigilanteActualizar(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo cambiar_clave_vigilante.php,
         * codigo_editar_vigilante.php, codigo_informacion_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se actualizaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){   
            /**
             *  lo direcciona a la vista del perfil_vigilante.php
             */ 
            location = '../vistas/perfil_vigilante.php';
        });
    }
    function perfilVigilanteError(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo cambiar_clave_vigilante.php,codigo_editar_vigilante.php,
         * codigo_elemento_vigilante.php, codigo_informacion_vigilante.php, insertar_sin_serial_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Por favor completa los campos', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){ 
            /**
             *  lo direcciona a la vista del perfil_vigilante.php
             */ 
            location = '../vistas/perfil_vigilante.php';  
        });
    }
    function perfilVigilanteErrorElemento(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_vigilante.php, 
         * insertar_sin_serial_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Ese número serial ya ha sido registrado', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){   
            /**
             *  lo direcciona a la vista del perfil_vigilante.php
             */ 
            location = '../vistas/perfil_vigilante.php';  
        });
    }
/**
 * fin alertas perfil vigilante
 */

/**
 * Inicio alertas perfil usuario 
 */
    function perfilUsuario(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_usuario.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){   
            /**
             *  lo direcciona a la vista del perfil_usuario.php
             */
            location = '../vistas/perfil_usuario.php';  
        });
    }
    function perfilUsuarioCompletarDatos(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_editar_usuario.php,
         * codigo_clave_usuario.php, codigo_elemento_usuario.php, codigo_informacion_usuario.php, insertar_sin_serial.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Por favor completa los campos', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){    
            /**
             *  lo direcciona a la vista del perfil_usuario.php
             */
            location = '../vistas/perfil_usuario.php';  
        });
    }
    function perfilUsuarioActualizar(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_editar_usuario.php,
         * codigo_clave_usuario.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se actualizaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){   
            /**
             *  lo direcciona a la vista del perfil_usuario.php
             */
            location = '../vistas/perfil_usuario.php'; 
        });
    }
    function perfilUsuarioSerialExiste(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_usuario.php,
         * insertar_sin_serial.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Ese número serial ya ha sido registrado', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){ 
            /**
             *  lo direcciona a la vista del perfil_usuario.php
             */  
            location = '../vistas/perfil_usuario.php';  
        });
    }
    function perfilUsuarioElemetoSinSerial(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo insertar_sin_serial.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){   
            /**
             *  lo direcciona a la vista del stiker_usuario.php
             */
            location = '../vistas/stiker_usuario.php';  
        });
    }
/**
 * fin perfil usuario
 */

/**
 * Inicio perfil supervisor
 */
    function perfilSupervisor(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_supervisor.php,
         * codigo_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){               
            /**
             *  lo direcciona a la vista del perfil_supervisor.php
             */
            location = '../vistas/perfil_supervisor.php';      
        });
    }
    function perfilSupervisorCompletarDatos(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_editar_supervidor.php,cambiar_clave_supervisor.php,
         * codigo_elemento_supervisor.php, codigo_informacion_supervisor.php, insertar_sin_serial_super.php, codigo_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Por favor completa los campos', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del perfil_supervisor.php
             */
            location = '../vistas/perfil_supervisor.php';  
        });
    }
    function perfilSupervisorActualizar(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_editar_supervidor.php,cambiar_clave_supervisor.php,
         * codigo_informacion_supervisor.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se actualizaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del perfil_supervisor.php
             */
            location = '../vistas/perfil_supervisor.php';  
            
        });
    }
    function perfilSupervisorSerialExiste(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_supervidor.php,
         * insertar_sin_serial_super.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Ese número serial ya ha sido registrado', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del perfil_supervisor.php
             */
            location = '../vistas/perfil_supervisor.php';  
            
        });
    }
    function perfilSupervisorElemetoSinSerial(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo insertar_sin_serial_super.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del stiker_super.php
             */
            location = '../vistas/stiker_super.php';  
        
        });
    }
    function perfilSupervisorError(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Ha ocurrido un error', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del perfil_supervisor.php
             */
            location = '../vistas/perfil_supervisor.php';  
        });
    }
    function perfilSupervisorClaveDiferente(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_vigilante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Las contraseñas no son iguales', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del perfil_supervisor.php
             */
            location = '../vistas/perfil_supervisor.php';  
        });
    }
/**
 * fin alertas perfil supervisor
 */

/**
 * Inicio alertas verificacion
 */
    function visitante(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_visitante.php, 
         * codigo_visitante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista de la modal con el formulario para registrar el elemento en verificacion.php
             */
            location = '../vistas/verificacion.php#openModal1';  
        });
    }
    function visitanteSticker(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo insertar_sin_serial_visitante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se ingresaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista de la modal con la tabla para generar el sticker del elemento en verificacion.php
             */
            location = '../vistas/verificacion.php#openModal4';  
            
        });
    }
    function visitanteClaveDiferentes(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_visitante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Las contraseñas no son iguales', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista de la modal con el formulario para registrar el visitante en verificacion.php
             */
            location = '../vistas/verificacion.php#openModal';  
        });
    }
    function visitanteError(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_visitante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Ha ocurrido un error', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista de la verificacion.php
             */
            location = '../vistas/verificacion.php';  
            
        });
    }
    function visitanteCompleteCampos(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_visitante.php, codigo_elemento_visitante.php,
         * insertar_sin_serial_visitante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Complete los campos', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista de la modal con el formulario registrar el visitante de la verificacion.php
             */
            location = '../vistas/verificacion.php#openModal';  
            
        });
    }
    function visitanteSerialRegistrado(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo codigo_elemento_visitante.php,
         * insertar_sin_serial_visitante.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Ese número serial ya ha sido registrado', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista de la modal con el formulario registrar elemento de la verificacion.php
             */
            location = '../vistas/verificacion.php#openModal1';  
            
        });
    }
/**
 * Fin alertas verificacion
 */

/**
 * Inicio alertas recuperar clave
 */
    function recuperarClave(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo recuperar_clave.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Muy bien!',
            text: 'Los datos se actualizaron correctamente', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#0097A7',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){  
            /**
             *  lo direcciona a la vista del index.php
             */
            location = '../index.php';  
            
        });
    }
    function recuperarClaveCompleteDatos(){ 
        /**
         * se llama la funcion Swal.fire de la libreria SweetAlert2(agregada en el archivo recuperar_clave.php) para mostrar la alerta
         */
        Swal.fire({
            title: 'Ups!',
            text: 'Complete los campos', 
            confirmButtonText: 'Aceptar', 
            confirmButtonColor: '#1ABC9C',
            backdrop: false
        })
        /**
         * .then        redirige despues de dar click en el boton
         */
        .then(function(){
            /**
             *  lo direcciona a la vista del formulario para recuperar la clave, en el archivo formulario.php
             */
            location = '../vistas/formulario.php';  
            
        });
    }
/**
 * Fin alertas recuperar clave
 */