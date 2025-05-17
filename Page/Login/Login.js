document.getElementById('loginForm').addEventListener('submit', function (event) {
  event.preventDefault(); 

  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  if (email && password) {
    console.log("Datos correctos, redirigiendo..."); // Verifica si llega hasta aquí
    window.location.href = "../Layout/layout.html";
  } else {
    alert("Por favor, completa todos los campos.");
  }
});
