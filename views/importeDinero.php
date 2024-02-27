<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <hr>
    <body style="background-color: aliceblue;
    font-family: roboto;
    margin: auto;">

    <div class="container" tyle="background-color: aliceblue;
    font-family: roboto;
    margin: auto; border-radius: 15px 10px 15px 10px;">

        <h1 style="background-color: aliceblue;
        font-family: roboto;
        margin: auto;
        text-align: center; border-radius: 15px 10px 15px 10px;">COLABORACION</h1>

        <a href="eventos.php" class="btn btn-outline-light btn-lg px-5" style="background-color: #1f2735; right: 140px; width: 150px; position: fixed; background-color:black;">Cancelar</a>

        <br><br><br><br>

    
            <script>
                Swal.fire({
                title: 'Cuanto dinero aportará?',
                icon: 'question',
                input: 'range',
                inputAttributes: {
                    min: 100,
                    max: 5000,
                    step: 10
                },
                inputValue: 100,
                showCancelButton: true, // Mostrar botón de cancelar
                cancelButtonText: 'Cancelar', // Texto del botón de cancelar
                confirmButtonText: 'Aceptar', // Texto del botón de aceptar
                inputValidator: (value) => {
                    if (!value) {
                        return 'Debe ingresar un valor válido';
                    }
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = 'eventos.php'; // Redireccionar a otra_pagina.php
                }
                }).then(function(){
                    let timerInterval
                    Swal.fire({
                    title: 'Realizando transferencia!',
                    html: 'Esto terminara en: <b></b> milisegundos.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then(function() {
                            window.location.replace("eventos.php");
                    })
                    
                })

               
                                
            </script>
                

    </div>
        
    </body>

</html>