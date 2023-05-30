  var APICN = 'https://api.chucknorris.io/jokes/random'
    var chisteAleatorio = document.getElementById('chiste_aleatorio')
    
    fetch(APICN)
      .then(function(response) {
        return response.json()
      })
      .then(function(data) {
        var chiste = data.value
        var actualizado = new Date(data.updated_at).toLocaleDateString()
        var categoria = data.categories.length > 0 ? data.categories[0] : 'General'
        
        var chisteHtml = '<p><strong>Chiste:</strong> ' + chiste + '</p>'
        chisteHtml += '<p><strong>Actualizado:</strong> ' + actualizado + '</p>'
        chisteHtml += '<p><strong>Categoría:</strong> ' + categoria + '</p>'
        
        chisteAleatorio.innerHTML = chisteHtml
      })
    
    var categorias = 'https://api.chucknorris.io/jokes/categories'
    var listaCategorias = document.getElementById('lista_categorias')
    
    fetch(categorias)
      .then(function(response) {
        return response.json()
      })
      .then(function(data) {
        var categorias = data
        var listaCategoriasHtml = ''
        
        categorias.forEach(function(categoria) {
          var enlaceCategoria = '<a href="#" class="enlace_categoria" data_categoria="' + categoria + '">' + categoria + '</a>'
          listaCategoriasHtml += '<li>' + enlaceCategoria + '</li>'
        })
        
        listaCategorias.innerHTML = listaCategoriasHtml
      })
    
    var formularioBusqueda = document.getElementById('formulario_busqueda')
    var textoBusqueda = document.getElementById('texto_busqueda')
    var resultadoBusqueda = document.getElementById('resultado_busqueda')
    
    formularioBusqueda.addEventListener('submit', function(event) {
      event.preventDefault()
      
      var texto = textoBusqueda.value
      var busqueda = texto !== '' ? APICN + '?query=' + texto : APICN
      
      fetch(busqueda)
        .then(function(response) {
          return response.json()
        })
        .then(function(data) {
          var chiste = data.value
          
          var chisteHtml = '<p><strong>Chiste:</strong> ' + chiste + '</p>'
          resultadoBusqueda.innerHTML = chisteHtml
        })
    })
    
    listaCategorias.addEventListener('click', function(event) {
      event.preventDefault()
      
      var target = event.target
      if (target.classList.contains('enlace_categoria')) {
        var categoria = target.getAttribute('data_categoria')
        var finalCategoria = APICN + '?category=' + categoria
        
        fetch(finalCategoria)
          .then(function(response) {
            return response.json()
          })
          .then(function(data) {
            var chiste = data.value
            
            var chisteHtml = '<p><strong>Chiste:</strong> ' + chiste + '</p>'
            resultadoBusqueda.innerHTML = chisteHtml
          })
      }
    })