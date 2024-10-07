document.getElementById('archivo').addEventListener('change', function() {
    const file = this.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        const reader = new FileReader(); 
        reader.onload = function(e) { //Se define una función que se ejecuta cuando la lectura se completa (onload). Esta función asigna el resultado de la lectura (una URL de datos de la imagen) a la fuente (src) de la etiqueta <img>, haciendo que la imagen se muestre en la página.
            preview.src = e.target.result; // Asignar la imagen a la etiqueta img
            preview.style.display = 'block'; // Mostrar la imagen
        };
        reader.readAsDataURL(file); // reader.readAsDataURL(file) se utiliza para leer el archivo como una URL de datos, lo que permite que el navegador muestre la imagen en la etiqueta <img>.
    }
});

document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const formData = new FormData();
    formData.append('archivo', document.getElementById('archivo').files[0]);

    fetch('subir.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('respuesta').innerText = data; 
    });
});
