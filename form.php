<?php 
session_start();
include "header.php"; 
// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header("Location: login/login.php");
    exit;
}

include "conexion.php";
$conn = conexion();
$sql = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['username']."'";

// Ejecutar la consulta
$result = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMATO DE VISITA TÉCNICA - METAL RAID PERU S.A.C</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      body {
        font-family: 'Roboto', sans-serif;
      } 

      .form-group{
        font-family: 'Roboto', sans-serif;
      }

      h1{
        text-transform: uppercase;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
      }

      h2, h3 {
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
      }
    </style>
  </head>

  <h1 class="text-center mt-5">Bienvenido <?php echo $row['cargo'];?></h1>

  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
        <form action="registro.php" method="post" enctype="multipart/form-data">
          
          <h2 class="text-center mt-5">INFORMACIÓN GENERAL DEL TRABAJO</h2>
          
          <hr>

          <div class="form-group my-3">
              <label for="nombre">Nombre Del Trabajador<span>*</span></label>
              <input type="text" name="nombre" id="nombre"class="form-control" required>
          </div>

          <div class="form-group my-3">
              <label for="descripcion">Descripción de Trabajo<span>*</span></label>
              <input type="text" name="descripcion" id="descripcion"class="form-control" >
          </div>

          <div class="form-group my-3">
              <label for="objetivo">Objetivo de Trabajo<span>*</span></label>
              <input type="text" name="objetivo" id="objetivo"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="area">Área de trabajo de Cliente<span>*</span></label>
              <input type="text" name="area" id="area"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="persona">Persona de Contacto Usuario Final<span>*</span></label>
              <input type="text" name="persona" id="persona"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="logistico">Persona de Contacto Logístico<span>*</span></label>
              <input type="text" name="logistico" id="logistico"class="form-control">
          </div>
      
          <div class="form-group my-3">
              <label for="ubicacion">Ubicación / Localización<span>*</span></label>
              <input type="text" name="ubicacion" id="ubicacion"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="tiempo">Tiempo de Entrega de Valorización<span>*</span></label>
              <input type="text" name="tiempo" id="tiempo"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="trabajo">Tiempo de Entrega de Trabajo<span>*</span></label>
              <input type="text" name="trabajo" id="trabajo"class="form-control">
          </div>
          
          <div class="form-group my-3">
          <label for="prioridad">Prioridad de Ejecución<span>*</span></label>
          <select id="prioridad" onchange="generarInput()" name="prioridad" class="form-control">
            <option value="-">-</option>
            <option value="Emergencia">Emergencia</option>
            <option value="Programado">Programado</option>
            <option value="Otros">Otros (especificar)</option>
          </select>   
          <div class="my-1" id="contenedor"></div>
            <script>
              function generarInput() {
                var select = document.getElementById("prioridad");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "prioridad";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="accesibilidad">Accesibilidad a área de Trabajo<span>*</span></label>
              <select id="accesibilidad" onchange="generarInput2()" name="accesibilidad" class="form-control">
                <option value="-">-</option>
                <option value="Peatonal">Peatonal</option>
                <option value="Coche de trabajo">Coche de trabajo</option>
                <option value="Vehicular con camioneta">Vehicular con camioneta</option>
                <option value="Vehicular con Grúa">Vehicular con Grúa</option>
                <option value="Otros">Otros (especificar)</option>
              </select>
          <div class="my-1" id="contenedor2"></div>
            <script>
              function generarInput2() {
                var select = document.getElementById("accesibilidad");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor2");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "accesibilidad";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="disponibilidad">Disponibilidad de área, equipo, unidad de trabajo<span>*</span></label>
              <select id="disponibilidad" onchange="generarInput3()" name="disponibilidad" class="form-control">
                <option value="-">-</option>
                <option value="Trabaja las 24 horas">Trabaja las 24 horas</option>
                <option value="Tiene paradas de mantenimiento semanal">Tiene paradas de mantenimiento semanal</option>
                <option value="Tiene paradas de mantenimiento quincenal">Tiene paradas de mantenimiento quincenal</option>
                <option value="Tiene paradas de mantenimiento anual">Tiene paradas de mantenimiento anual</option>
                <option value="Otros">Otros (especificar)</option>
              </select>
          <div class="my-1" id="contenedor3"></div>
            <script>
              function generarInput3() {
                var select = document.getElementById("disponibilidad");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor3");
              if (opcionSeleccionada) {
                var input = document.createElement("input"); 
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "disponibilidad";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="horario">Horario de trabajo para trabajo del cliente<span>*</span></label>
              <select id="horario" onchange="generarInput4()" name="horario" class="form-control">
                <option value="-">-</option>
                <option value="Lunes a sábado diurno">Lunes a sábado diurno</option>
                <option value="Lunes a sábado nocturno">Lunes a sábado nocturno</option>
                <option value="Domingo">Domingo</option>
                <option value="Feriados">Feriados</option>
                <option value="Otros">Otros (especificar)</option>
              </select>
          <div class="my-1" id="contenedor4"></div>
            <script>
              function generarInput4() {
                var select = document.getElementById("horario");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor4");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "horario";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>    

          <div class="form-group my-3">
              <label for="anticorrupcion">Anticorrupción<span>*</span></label>
              <select id="anticorrupcion"onchange="generarInput5()" name="anticorrupcion" class="form-control">
                <option value="-">-</option>
                <option value="Logístico es transparente con la información">Logístico es transparente con la información</option>
                <option value="Jefe de área producción  es transparente con la información">Jefe de área producción  es transparente con la información</option>
                <option value="Jefe de mantenimiento  es transparente con la información">Jefe de mantenimiento  es transparente con la información</option>
                <option value="Otros indicios de hostigamiento a proveedor">Otros indicios de hostigamiento a proveedor (especificar)</option>
              </select>
          <div class="my-1" id="contenedor5"></div>
            <script>
              function generarInput5() {
                var select = document.getElementById("anticorrupcion");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros indicios de hostigamiento a proveedor";
                var contenedor = document.getElementById("contenedor5");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "anticorrupcion";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div> 

          <div class="form-group my-3">
              <label for="valorizacion">Tipo de Valorización<span>*</span></label>
              <select id="valorizacion" onchange="generarInput6()" name="valorizacion" class="form-control">
                <option value="-">-</option>
                <option value="Concursable">Concursable</option>
                <option value="Exploración de precios">Exploración de precios</option>
                <option value="Otros">Otros (especificar)</option>
              </select>
          <div class="my-1" id="contenedor6"></div>
            <script>
              function generarInput6() {
                var select = document.getElementById("valorizacion");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor6");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "valorizacion";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>
          
          <hr>
          <h2 class="text-center">INFORMACIÓN ESPECIFICA DEL TRABAJO</h2>
          <hr>

          <div class="form-group my-3">
              <label for="negocio">Línea de Negocio<span>*</span></label>
              <select id="negocio" onchange="generarInput7()" name="negocio" class="form-control">
                <option value="-">-</option>
                <option value="Proyecto">Proyecto</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Fabricación">Fabricación</option>
                <option value="Servicios Genenerales">Servicios Genenerales</option> 
                <option value="Otros">Otros (especificar)</option>           
              </select>
          <div class="my-1" id="contenedor7"></div>
            <script>
              function generarInput7() {
                var select = document.getElementById("negocio");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor7");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "negocio";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="alcance">Tipo de Documentación de alcance de servicio<span>*</span></label>
              <select id="alcance" onchange="generarInput8()" name="alcance" class="form-control">
                <option value="-">-</option>
                <option value="Bosquejo">Bosquejo</option>
                <option value="Memoria de Cálculo">Memoria de Cálculo</option>
                <option value="Planos de Detalle">Planos de Detalle</option>
                <option value="Información Verbal">Información Verbal</option>
                <option value="Otros">Otros (especificar)</option>
              </select>
          <div class="my-1" id="contenedor8"></div>
            <script>
              function generarInput8() {
                var select = document.getElementById("alcance");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor8");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "alcance";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="mano">Mano de Obra<span>*</span></label>
              <select id="mano" onchange="generarInput9()" name="mano" class="form-control"><option value="-">-</option>
                <option value="Técnicos">Técnicos </option>
                <option value="Ingeniería">Ingeniería</option>
                <option value="Mano de obra con certificación especial">Mano de obra con certificación especial (especificar)</option>
                <option value="Certificaciones de empresa específicos">Certificaciones de empresa específicos (especificar)</option>           
              </select>
          <div class="my-1" id="contenedor9"></div>
            <script>
              function generarInput9() {
                var select = document.getElementById("mano");
                var opcionSeleccionada = select.options[select.selectedIndex].value;
                var contenedor = document.getElementById("contenedor9");
                // Eliminar todos los campos de entrada antiguos
              while (contenedor.firstChild) {
                  contenedor.removeChild(contenedor.firstChild);
              }

              if (opcionSeleccionada == "Certificaciones de empresa específicos" || opcionSeleccionada == "Mano de obra con certificación especial") {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "mano";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="materiales">Materiales<span>*</span></label>
              <select id="materiales" onchange="generarInput10()" name="materiales" class="form-control">
                <option value="-">-</option>
                <option value="Materiales especiales">Materiales especiales (especificar)</option>          
              </select>
          <div class="my-1" id="contenedor10"></div>
            <script>
              function generarInput10() {
                var select = document.getElementById("materiales");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Materiales especiales";
                var contenedor = document.getElementById("contenedor10");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "materiales";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="servicios">Servicios<span>*</span></label>
              <select id="servicios" onchange="generarInput11()" name="servicios" class="form-control">
                <option value="-">-</option>
                <option value="Servicios externos especiales">Servicios externos especiales (especificar)</option>          
              </select>
          <div class="my-1" id="contenedor11"></div>
            <script>
              function generarInput11() {
                var select = document.getElementById("servicios");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Servicios externos especiales";
                var contenedor = document.getElementById("contenedor11");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "servicios";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>
          
          <div class="form-group my-3">
              <label for="cliente">Servicios compartidos con Cliente<span>*</span></label>
              <select id="cliente" onchange="generarInput12()" name="cliente" class="form-control">
                <option value="-">-</option>
                <option value="Agua">Agua</option>
                <option value="Comedor">Comedor</option>
                <option value="Servicios Higiénicos">Servicios Higiénicos</option>
                <option value="Estacionamiento Interno, Externo">Estacionamiento Interno, Externo (especificar)</option>       
                <option value="Energía Eléctrica (Especificar voltaje y distancia de punto de energía)">Energía Eléctrica (Especificar voltaje y distancia de punto de energía)</option> 
                <option value="Aire Comprimido (especificar presión y distancia a punto de energía)">Aire Comprimido (especificar presión y distancia a punto de energía)</option>   
                <option value="Otros">Otros (especificar)</option>
              </select>
          <div class="my-1" id="contenedor12"></div>
            <script>
              function generarInput12() {
                var select = document.getElementById("cliente");
                var opcionSeleccionada = select.options[select.selectedIndex].value;
                var contenedor = document.getElementById("contenedor12");
                // Eliminar todos los campos de entrada antiguos
              while (contenedor.firstChild) {
                contenedor.removeChild(contenedor.firstChild);
              }

              if (opcionSeleccionada == "Estacionamiento Interno, Externo" || opcionSeleccionada == "Energía Eléctrica (Especificar voltaje y distancia de punto de energía)" || opcionSeleccionada == "Aire Comprimido (especificar presión y distancia a punto de energía)" || opcionSeleccionada == "Otros") {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "cliente";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }
            }
            </script>
          </div>

          <hr>
          <h2 class="text-center">SEGURIDAD INDUSTRIAL</h2>
          <hr>

          <div class="form-group my-3">
              <label for="tipotrabajo">Tipo de Trabajo<span>*</span></label>
              <select id="tipotrabajo" onchange="generarInput13()" name="tipotrabajo" class="form-control">
                <option value="-">-</option>
                <option value="Trabajo en Caliente">Trabajo en Caliente</option>
                <option value="Trabajo Eléctrico">Trabajo Eléctrico</option>
                <option value="Trabajo en Altura">Trabajo en Altura</option>
                <option value="Trabajo de Maniobras de Izaje">Trabajo de Maniobras de Izaje</option> 
                <option value="Otros">Otros (especificar)</option>           
          </select>
          <div class="my-1" id="contenedor13"></div>
            <script>
              function generarInput13() {
                var select = document.getElementById("tipotrabajo");
                var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
                var contenedor = document.getElementById("contenedor13");
              if (opcionSeleccionada) {
                var input = document.createElement("input");
                  input.classList.add('form-control');
                  input.type = "text";
                  input.name = "tipotrabajo";
                  input.placeholder = "Especificar";
                  contenedor.appendChild(input);
              }else {
                  contenedor.innerHTML = '';
              }
            }
            </script>
          </div>

          <div class="form-group my-3">
              <label for="epp">EPP<span>*</span></label>
              <input type="text" name="epp" id="epp" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="equipos">Equipos<span>*</span></label>
              <input type="text" name="equipos" id="equipos" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="procedimientos">Procedimientos Específicos<span>*</span></label>
              <input type="text" name="procedimientos" id="procedimientos" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="jefe">Jefe de Seguridad de área y teléfono de contacto<span>*</span></label>
              <input type="text" name="jefe" id="jefe" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="riesgos">Riesgos de trabajo específicos (especificar)<span>*</span></label>
              <input type="text" name="riesgos" id="riesgos" class="form-control">
          </div>
          
          <div class="form-group my-3">
              <label for="observaciones">Observaciones del trabajo<span>*</span></label>
              <textarea name="observaciones" rows="3" id="observaciones" class="form-control"></textarea>
          </div>

          <div class="form-group my-3">
              <label for="imagen">Apuntes, Medidas, Gráficas de campo*</label>
              <input type="file" name="imagen[]" multiple id="imagen" accept="image/*" class="form-control">
          </div>

          <div class="container-fluid h-100">
            <div class="row w-100 align-items-center">
              <div class="col text-center mt-3 mb-3">
                <button type="submit" class="btn btn-primary btn-block">Enviar Formulario</button>
              </div>
            </div>
          </div> 

        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>