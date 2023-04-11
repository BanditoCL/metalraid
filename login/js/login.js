$(document).ready(function() {
    $('#formulario').submit(function(event) {
        event.preventDefault(); 
  
          var usuario = $('#login').val().trim();
          var contraseña = $('#password').val().trim();
          
        if (usuario === '') {
            $('#login').parent('.form-control').addClass('falla');
            $('#login').next('p').text('El usuario es obligatorio');
            return;
          } else {
            $('#login').parent('.form-control').removeClass('falla').addClass('ok');
        }
        
        if (contraseña === '') {
          $('#password').parent('.form-control').addClass('falla');
          $('#password').next('p').text('La contraseña es obligatoria');
          return;
          } else {
          $('#password').parent('.form-control').removeClass('falla').addClass('ok');
        }

      $.ajax({
          url: './login_proceso.php',
          method: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            if (response == 'success') {
              window.location.href = '../form.php';
            } else {
              $('#login').next('p').empty(); 
              $('#password').next('p').empty(); 
              $('#login').val(''); 
              $('#password').val(''); 
              $('#login').parent('.form-control').addClass('falla');
              $('#password').parent('.form-control').addClass('falla');
              $('#password').next('p').text('Usuario no existe o es incorrecto'); 
            }
          },
          error: function(xhr, status, error) {

            console.log(xhr.responseText);
          }
      });
      return false; //Evita que la pagina se recargue
    });
  }); 