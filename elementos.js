document.getElementById('formulario-respuesta').addEventListener('submit', function() {
    document.getElementById('hidden_respuesta1').value = document.getElementById('respuesta1').value;
    document.getElementById('hidden_respuesta2').value = document.getElementById('respuesta2').value;
});
  // Temporizador
  var timeLeft = 15;
  var timerElement = document.getElementById('timer');
  var questionContainer = document.getElementById('question-container');
  var interval = setInterval(function() {
      timeLeft--;
      timerElement.textContent = timeLeft;
      if (timeLeft <= 0) {
          clearInterval(interval);
          timerElement.textContent = "Tiempo agotado";
          questionContainer.style.border = "2px solid red";
          var inputs = questionContainer.querySelectorAll('input[type="radio"]');
          inputs.forEach(input => input.disabled = true);
          document.querySelector('.text-boxes input[type="submit"]').disabled = true;
      }
  }, 1000);