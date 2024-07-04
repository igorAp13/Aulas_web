let num = parseFloat(window.prompt('Digite um número'))
const juros = 0.007
let total = num*(1 + juros)

alert('R$:'+total.toFixed(2))

