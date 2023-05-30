var claveAcceso = 'TU_CLAVE_DE_ACCESO'
    
var cuadroBusqueda = document.getElementById('cuadro_busqueda')
var numImagenes = document.getElementById('num_imagenes')
var boton = document.getElementById('boton')

var contenedorMiniaturas = document.getElementById('contenedor_miniaturas')

boton.addEventListener('click', function() {
  var busqueda = cuadroBusqueda.value
  var imagenes = numImagenes.value
  
  var url = `https://api.unsplash.com/search/photos?query=${busqueda}&per_page=${imagenes}&client_id=${claveAcceso}`
  
  fetch(url)
    .then(function(response) {
      return response.json()
    })
    .then(function(data) {
      mostrarMiniaturas(data.results)
    })
})

function mostrarMiniaturas(imagenes) {
  contenedorMiniaturas.innerHTML = ''
  
  imagenes.forEach(function(imagen) {
    var miniatura = document.createElement('img')
    miniatura.src = imagen.urls.thumb
    miniatura.alt = imagen.alt_description
    miniatura.addEventListener('click', function() {
      paginaDetalles(imagen)
    })
        
    var divImagen = document.createElement('div')
    divImagen.appendChild(miniatura)
    
    contenedorMiniaturas.appendChild(divImagen)
  })
}

function paginaDetalles(imagen) {
    var ventanaDetalles = window.open(imagen.links.html)
    
    ventanaDetalles.document.write(`
      <html>
      <head>
        <meta charset="UTF-8">
      </head>
      <body>
        <h1>${imagen.alt_description}</h1>
        <img src="${imagen.urls.regular}" alt="${imagen.alt_description}">
        <div>
          <a href="${imagen.urls.small}">Baja resolución</a>
          <a href="${imagen.urls.regular}">Resolución media</a>
          <a href="${imagen.urls.full}">Alta resolución</a>
        </div>
      </body>
      </html>
    `)
    
    ventanaDetalles.document.close()
  }