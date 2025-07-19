<?php
require "CONFIG/obtenerCat.php"
?>
<?php
$opcionSeleccionada = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$motoSeleccionada = isset($_POST['nombre']) ? $_POST['nombre'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/financiamiento.css" />
</head>

<body>
    <?php
    include "header.php"
    ?>
    <form id="Form" action="CONFIG/form_financiamiento.php" method="POST">
    <div class="container">
        <h1>FINANCIA TU MOTO</h1>
        <p class="p-financiamiento">¡¡¡Financia tu moto en tres pasos y conoce tus planes disponibles !!!</p>
        <div class="step">
            <div class="step-header">
                <h2>01</h2>
                <h3>Elige tu modelo</h3>
            </div>
            <div class="step-content">
                <div class="form-group">
                    <label for="tipo-moto">Tipo de moto</label>
                    <select id="categoria" required>
                        <option value="">Seleccionar tipo</option>
                        <?php foreach ($resultado as $e) { ?>
                            <option value="<?php echo $e['id']; ?>"  <?php echo $opcionSeleccionada == $e['id'] ? 'selected' : '';?>>
                                <?php echo $e['nombre']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modelo-moto">Selecciona modelo</label>
                    <select id="moto" name="moto" required>
                        <option value="">Seleccionar modelo</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="step">
            <div class="step-header">
                <h2>02</h2>
                <h3>Déjanos tus datos</h3>
            </div>
            <div class="step-content">
                <div class="form-group horizontal">
                    <div>
                        <label for="nombres">Nombres</label>
                        <input type="text" id="nombres" name="nombres" placeholder="Ingresa tus nombres" required>
                    </div>
                    <div>
                        <label for="apellidos">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos">
                    </div>
                </div>
                <div class="form-group horizontal">
                    <div>
                        <label for="celular">Celular</label>
                        <input type="text" id="celular" name="celular" placeholder="Ingresa tu celular" required>
                    </div>
                    <div>
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
                    </div>
                </div>
                <div class="form-group horizontal">
                    <div>
                        <label for="tipo-documento">Tipo de documento</label>
                        <select id="tipo-documento" required>
                            <option value="dni">DNI</option>
                            <option value="pasaporte">PASAPORTE</option>
                            <option value="carnet de extranjeria">CÁRNET DE EXTRANJERIA</option>
                        </select>
                    </div>
                    <div>
                        <label for="numero-documento">Número de documento</label>
                        <input type="text" id="numero_documento" name="numero_documento" placeholder="Número de documento" required>
                    </div>
                </div>
                <div class="form-group horizontal">
                    <div>
                        <label for="departamento">Departamento</label>
                        <select id="departamento" name="departamento" required>
                            <option value="">Selecciona departamento</option>
                            <option value="ica"> ICA</option>
                            <option value="lima">LIMA</option>
                        </select>
                    </div>
                    <div>
                        <label for="provincia">Provincia</label>
                        <select id="provincia" name="provincia" required>
                            <option value="">Selecciona la provincia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="distrito">Distrito</label>
                    <select id="distrito" name="distrito" required>
                        <option value="">Selecciona el distrito</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha de nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
            </div>
        </div>

        <div class="step">
            <div class="step-header">
                <h2>03</h2>
                <h3>Situación laboral</h3>
            </div>
            <div class="step-content">
                <div class="form-group  opcion-formulario">
                    <label class="option">
                        <input type="radio" id="situacion_laboral" name="situacion_laboral" value="dependiente" checked>
                        <span class="option-content">
                            <span class="option-title"><strong> Soy Dependiente</strong></span>
                            <span class="option-description">Estoy en planilla en la empresa donde trabajo</span>
                        </span>
                    </label>
                    <label class="option">
                        <input type="radio" id="situacion_laboral" name="situacion_laboral" value="independiente">
                        <span class="option-content">
                            <span class="option-title"><strong>Soy Independiente</strong></span>
                            <span class="option-description">Realizo trabajos y/o servicios por
                                Honorarios</span>
                        </span>
                    </label>
                </div>
                <div class="form-group horizontal">
                    <div>
                        <label for="cuota-inicial">¿Cuánto es tu cuota inicial? Cuota inicial mínima 500 soles</label>
                        <input type="text" id="cuota_inicial" name="cuota_inicial" placeholder="S/ 0,000" required>
                    </div>
                    <div>
                        <label for="ingreso-mensual">¿Cuánto es tu ingreso mensual?</label>
                        <input type="text" id="ingreso_mensual" name="ingreso_mensual" placeholder="S/ 0,000">
                    </div>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                </div>
            </div>
        </div>

        <div class="footer">
            <label>
                <input type="checkbox" required> ZIRCON BIKER E.I.R.L RUC 20611376066. Al hacer clic aceptas las <a href="#">Políticas de tratamientos de datos</a> dadas por ZIRCONBIKER.
            </label>
            <button type="submit">Solicitar financiamiento</button>
        </div>
    </div>
    </form>
    <?php
    include "footer.php"
    ?>
    <script type="module" src="JS/funcionalidades/financiamiento.js"></script>
    <script type="module" src="JS/funcionalidades/index.js"></script>
    <script src="JS/funcionalidades/financiamientoCarMot.js"></script>
    <script>alCargarFinanciamiento(<?php echo  $opcionSeleccionada?>,'<?php echo  $motoSeleccionada?>');</script>

</body>

</html>