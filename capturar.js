function capturarRespuestas() {
    // Obtener las respuestas seleccionadas
    const respuesta1 = document.getElementById('respuesta_a').checked;
    const respuesta2 = document.getElementById('respuesta_b').checked;
    const respuesta3 = document.getElementById('respuesta_c').checked;
  
    // Almacenar las respuestas en variables
    let respuesta1Valor = respuesta1 ? 'a' : '';
    let respuesta2Valor = respuesta2 ? 'b' : '';
    let respuesta3Valor = respuesta3 ? 'c' : '';
  
    // Actualizar los campos de texto ocultos
    document.getElementById('hidden_respuesta1').value = respuesta1Valor;
    document.getElementById('hidden_respuesta2').value = respuesta2Valor;
    document.getElementById('hidden_respuesta3').value = respuesta3Valor;
  }