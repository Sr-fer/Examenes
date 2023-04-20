//Función del lanzamiento de un dado
function lanzarDado() {
  return new Promise((resolve) => {
    const tiempoAleatorio = Math.floor(Math.random() * 3000) + 1000;
    setTimeout(() => {
      const resultado = Math.floor(Math.random() * 6) + 1;
      resolve(resultado);
    }, tiempoAleatorio);
  });
}
  
//Función del juego
function jugarDados() {
  console.log("Lanzando los dados");

  Promise.all([lanzarDado(), lanzarDado()]).then((resultados) => {
    const dado1 = resultados[0];
    const dado2 = resultados[1];

    console.log(`Dado 1: ${dado1}`);
    console.log(`Dado 2: ${dado2}`);

    if (dado1 === dado2) {
      console.log("¡Empate!");
    } else if (dado1 < dado2) {
      console.log("¡Gana el dado 1!");
    } else {
      console.log("¡Gana el dado 2!");
    }
  });
}
  
//Ejecutar la función de la partida
jugarDados();