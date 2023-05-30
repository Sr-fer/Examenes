var chuckNorrisAPI = 'https://api.chucknorris.io/jokes/random'
var boton = document.getElementById('boton')
var respuestaChistes = document.getElementById('mensaje_respuesta_chistes')
var botonEstadoCN = document.getElementById('boton_estado_cn')
var mensajeEstadoCN = document.getElementById('mensaje_respuesta_cn')

boton.addEventListener('click', function() {
    fetch(chuckNorrisAPI)
        .then(function(response) {
            mensajeEstadoCN.innerText = 'Estado HTTP: ' + response.status + ' - Fecha: ' + new Date().toLocaleString()
            return response.json()
        })
        .then(function(data) {
            var chiste = data.value
            respuestaChistes.innerHTML = chiste
        })
})

botonEstadoCN.addEventListener('click', function() {
    var mensajeEstadoCN = document.getElementById('mensaje_respuesta_cn')
    if (mensajeEstadoCN.style.display === 'none') {
        mensajeEstadoCN.style.display = 'block'
    } else {
        mensajeEstadoCN.style.display = 'none'
    }
})

var openWeatherAPI = 'https://api.openweathermap.org/data/2.5/weather?q=Vigo&appid={TU_API_KEY}'
var weatherInfo = document.getElementById('weather_info')
var respuestaWeather = document.getElementById('mensaje_respuesta_weather')
var botonEstadoW = document.getElementById('boton_Estado_w')
var mensajeEstadoW = document.getElementById('mensaje_respuesta_w')

function obtenerTiempo() {
    fetch(openWeatherAPI)
        .then(function(response) {
            mensajeEstadoW.innerText = 'Estado HTTP: ' + response.status + ' - ' + response.statusText + ' - Fecha: ' + new Date().toLocaleString()
            return response.json()
        })
        .then(function(data) {
            var ultimaActualizacion = new Date().toLocaleString()
            var temperatura = data.main.temp
            var descripcion = data.weather[0].description
            
            respuestaWeather.style.display = 'block'
            weatherInfo.innerHTML = 'Última Actualización: ' + ultimaActualizacion
            respuestaWeather.innerHTML = temperatura + '°C Descripción: ' + descripcion
        })
}

obtenerTiempo()
setInterval(obtenerTiempo, 20000)

botonEstadoW.addEventListener('click', function() {
    var mensajeEstadoW = document.getElementById('mensaje_respuesta_w')
    if (mensajeEstadoW.style.display === 'none') {
        mensajeEstadoW.style.display = 'block'
    } else {
        mensajeEstadoW.style.display = 'none'
    }
})