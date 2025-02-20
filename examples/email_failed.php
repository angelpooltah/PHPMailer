<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>H. Ayuntamiento Suma 2024 - 2027</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <br />
    <script>
      let timerInterval;
      Swal.fire({
        title: "¡Mensaje NO Enviado!",
        html: "Inténtalo de nuevo. <br><br> Serás redireccionado en <b></b> milisegundos.",
        icon: "error",
        timer: 4500,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        },
      }).then(function () {
        window.location.href = "contacto.php";
      });
    </script>
  </body>
</html>
