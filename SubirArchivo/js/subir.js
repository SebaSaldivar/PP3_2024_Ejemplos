document.getElementById('FormSubida').addEventListener('submit', function(event) { //Utiliza document.getElementById para obtener el formulario con el id FormSubida y le agrega un evento que se activará al enviarse (submit).
    event.preventDefault(); // Evitar la recarga de la página
    const formData = new FormData(); //FormData permite incluir archivos en la solicitud HTTP. Cuando subimos un archivo, necesitamos empaquetarlo de manera que el servidor pueda recibirlo correctamente, y FormData maneja esto de manera automática.
    formData.append('archivo', document.getElementById('archivo').files[0]); //formData.append() agrega un nuevo par clave/valor al objeto FormData. En este caso, la clave es 'archivo' y el valor es el primer archivo seleccionado por el usuario (document.getElementById('archivo').files[0]).

    fetch('subir.php', {
        method: 'POST', //fetch se utiliza para realizar una solicitud HTTP. En este caso, se envía una solicitud POST al archivo subir.php, pasando formData como cuerpo de la solicitud.
        body: formData
    })
    .then(response => response.text()) //Cuando se recibe la respuesta del servidor, se convierte a texto utilizando response.text().
    .then(data => {
        document.getElementById('respuesta').innerText = data; // El texto de la respuesta se muestra en el elemento con el id respuesta.
    });
});
