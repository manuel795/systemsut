document.getElementById('loginForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const email = document.getElementById('usuario').value;
  const password = document.getElementById('clave').value;

  fetch('sesion/procesar_login.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`,
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          if (data.rol === 'administrador') {
              window.location.href = './Administrador/adminPrincipal.php';
          } else {
              window.location.href = './Usuario/userPrincipal.php';
          }
      } else {
          document.getElementById('msg').textContent = data.message;
      }
  })
  .catch(error => console.error('Error:', error));
});