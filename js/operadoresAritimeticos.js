var subtotlal = (13+1)*5;
var frete = 0.5 * (13+1);
var total = subtotal + frete;


var subResultuado = document.getElementById('subtotal');
subResultuado.textContent = 'Subtotal: R$' + subtotal;

var freteResultado = document.getElementById('frete');
freteResultado.textContent = 'Frete: R$' + frete;

var totalResultado = document.getElementById('total');
freteResultado.textContent = 'Total: R$' + total;

function helloWorld(){
    document.write('Olá, Mundo!');
}