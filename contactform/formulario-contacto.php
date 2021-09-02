<html>
    <head>
        <title>Formulario de Contacto con Bootstrap y PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
      <!-- INICIO FORMULARIO HTML -->
<form method="POST" action="/index.php" class="needs-validation" novalidate>

    <div class="form-row mt-5">
        <div class="col-md-4 mb-3">
            <label for="validarNombre">Nombre:<span class="red">*</span></label>
            <input type="text" class="form-control" id="validarNombre" name="validarNombre" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarApellidos">Apellidos:<span class="red">*</span></label>
            <input type="text" class="form-control" id="validarApellidos" name="validarApellidos" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarEmail">Email:<span class="red">*</span></label>
            <input type="email" class="form-control" id="validarEmail" name="validarEmail" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarTelefono">Teléfono:</label>
            <input type="number" class="form-control" id="validarTelefono" name="validarTelefono" max="999999999">
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarTema">Tema:<span class="red">*</span></label>
            <select class="custom-select" id="validarTema" name="validarTema" required>
                <option selected disabled value="">Selecciona...</option>
                <option value="Problema con acceso a Web">Problema con acceso a Web</option>
                <option value="Propuesta de colaboración">Propuesta de colaboración</option>
                <option value="Eliminar mi usuario de la Web">Eliminar mi usuario de la Web</option>
                <option value="Otras cuestiones">Otras cuestiones</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="validarAsunto">Asunto:</label>
            <input type="text" class="form-control" id="validarAsunto" name="validarAsunto" required>
        </div>
    </div>

    <div class="form-group">
        <label for="validationMensaje">Mensaje:<span class="red">*</span></label>
        <textarea class="form-control" id="validationMensaje" name="validationMensaje" rows="3" min="25" required></textarea>
    </div>

    <div class="form-group mb-10">
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
        <button class="btn btn-success" type="reset" name="reset">Limpiar</button>
    </div>

</form>



<? php
if (isset($_POST['submit'])) {
    //ini_set( 'display_errors', 1 ); # REMOVE // FOR DEBUG
    //error_reporting( E_ALL ); # REMOVE // FOR DEBUG
    $from = "UNCORREO@TUDOMINIO.COM"; // Email con el dominio del Hosting para evitar SPAM
    $fromName = "RPF-WEB"; // Nombre que saldrá en el email recibido
    $to = "DESTINO@DOMINIO.COM"; // Dirección donde se enviará el formulario
    $subject = $_POST['validarAsunto']; // Asunto del Formulario

    /* Componemos el mensaje */
    $fullMessage = "Hola! " . $to . "\r\n";
    $fullMessage .= $_POST['validarNombre'] . " " . $_POST['validarApellidos'] . " te ha enviado un mensaje:\r\n";
    $fullMessage .= "\r\n";
    $fullMessage .= "Nombre: " . $_POST['validarNombre'] . "\r\n";
    $fullMessage .= "Apellidos: " . $_POST['validarApellidos'] . "\r\n";
    $fullMessage .= "E-Mail: " . $_POST['validarEmail'] . "\r\n";
    $fullMessage .= "Teléfono: " . $_POST['validarTelefono'] . "\r\n";
    $fullMessage .= "Tema: " . $_POST['validarTema'] . "\r\n";
    $fullMessage .= "Asunto: " . $_POST['validarAsunto'] . "\r\n";
    $fullMessage .= "Mensaje: " . $_POST['validationMensaje'] . "\r\n";
    $fullMessage .= "\r\n";
    $fullMessage .= "Saludos!\r\n";

    /* Creamos las cabeceras del Email */
    $headers = "Organization: RPF WEB\r\n";
    $headers .= "From: " . $fromName . "<" . $from . ">\r\n";
    $headers .= "Reply-To: " . $_POST['validarEmail'] . "\r\n";
    $headers .= "Return-Path: " . $to . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

    /* Enviamos el Formulario*/
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "<center><h2>El E-Mail se ha enviado correctamente!</h2></center>";
    } else {
        echo "<center><h2>Ops ! El E-Mail ha fallado!</h2></center>S";
    }
}
?>



<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
    
</html>