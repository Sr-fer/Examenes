var a = [9, 17, 29, 13, 25, 52];

//1
var arrayMultiplicado = a.map(num => num * 2);
console.log(arrayMultiplicado); //[18, 34, 58, 26, 50, 104]

//2
var f1 = num => num + 4;
var arraySumado4 = a.map(f1);
console.log(arraySumado4); //[13, 21, 33, 17, 29, 56]

//3
var menoresDe20 = a.filter(num => num < 20);
console.log(menoresDe20); //[9, 17, 13]

//4
var suma100 = a.reduce((acum, num) => acum + num, 100);
console.log(suma100); //245