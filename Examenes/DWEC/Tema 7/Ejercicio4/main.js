function iniciarSesion(googleUser) {
  const perfil = googleUser.getBasicProfile()
  const nombreUsuario = perfil.getGivenName()
  const apellidoUsuario = perfil.getFamilyName()
  const fotoUsuarioUrl = perfil.getImageUrl()
  
  document.getElementById('nombre_usuario').textContent = nombreUsuario
  document.getElementById('apellido_usuario').textContent = apellidoUsuario
  document.getElementById('foto_usuario').src = fotoUsuarioUrl
  
  document.getElementById('google_signin_button').style.display = 'none'
  document.getElementById('detalles_usuario').style.display = 'block'
}

function cerrarSesion() {
  const auth2 = gapi.auth2.getAuthInstance()
  auth2.signOut().then(function() {
    document.getElementById('google_signin_button').style.display = 'block'
    document.getElementById('detalles_usuario').style.display = 'none'
  })
}

window.onload = function() {
    google.accounts.id.initialize({
      client_id: 'TU_CLIENT_ID',
      callback: iniciarSesion,
    })
    google.accounts.id.renderButton(
      document.getElementById('google_signin_button'),
      { theme: 'filled_blue' }
    )
    
    document.getElementById('cerrar_sesion_button').addEventListener('click', cerrarSesion)
  }