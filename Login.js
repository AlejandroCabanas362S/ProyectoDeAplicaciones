// lista blanca de correos admitidos
const allowedUsers = ['acabanas@gmail.com', 'lberino@gmail.com'];
const correctPin   = '1234';

document.getElementById('loginForm').addEventListener('submit', (e) => {
  e.preventDefault();

  const email = document.getElementById('email').value.trim().toLowerCase();
  const pin   = document.getElementById('password').value.trim();

  if (allowedUsers.includes(email) && pin === correctPin) {
    // login válido
    window.location.href = 'index.php';
  } else {
    alert('Credenciales inválidas');
  }
});
