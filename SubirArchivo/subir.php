<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Verifica si la solicitud HTTP es un POST. Esto asegura que el código solo se ejecute cuando se envíe el formulario.
    $directorioDestino = 'img/'; //Se define la ruta donde se guardarán los archivos subidos, en este caso, dentro de la carpeta img.
    $archivo = basename($_FILES['archivo']['name']); //$_FILES['archivo']['name'] obtiene el nombre del archivo subido. basename() asegura que solo se obtenga el nombre del archivo sin su ruta completa, evitando posibles problemas de seguridad.
    $rutaArchivo = $directorioDestino . $archivo; //Combina el directorio de destino y el nombre del archivo para crear la ruta completa donde se almacenará el archivo.

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo)) { //move_uploaded_file() se utiliza para mover el archivo subido desde su ubicación temporal a la ruta especificada. Este paso es importante, ya que PHP almacena los archivos subidos en un directorio temporal antes de que se muevan a su ubicación final.
        echo "Archivo subido correctamente."; //Si el archivo se guarda correctamente, se envía un mensaje de éxito al usuario. De lo contrario, se envía un mensaje de error.
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
