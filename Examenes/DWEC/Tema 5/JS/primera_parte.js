//1
function suma(n, m) {
  return n + m;
}

//2
var f1 = (n, m) => n + m;
var f2 = (n, m) => suma(n, m);

//3
function sumatorio(a, b) {
  return a + b;
}

function resta(a, b) {
  return a - b;
}

function multi(a, b) {
  return a * b;
}

function calculadora(param1, param2, operacion) {
    return operacion(param1, param2);
  }

//4
console.log(calculadora(2, 3, sumatorio));
console.log(calculadora(5, 2, resta));
console.log(calculadora(4, 6, multi)); 