function enviarFormulario(event) {
    event.preventDefault();
    const respuesta = document.querySelector('input[name="respuesta"]:checked');
    const preguntaId = document.getElementById('pregunta-id').value;
    if (!respuesta) {
        alert('Por favor, seleccione una respuesta.');
        return;
    }
    fetch('guardar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nro_pregunta=${preguntaId}&respuesta=${respuesta.value}`,
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('mensaje').innerText = 'Su respuesta fue enviada';
    })
    .catch(error => {
        console.error('Error al enviar el formulario:', error);
        document.getElementById('mensaje').innerText = 'Hubo un error al enviar su respuesta. Por favor, inténtelo de nuevo.';
    });
} 