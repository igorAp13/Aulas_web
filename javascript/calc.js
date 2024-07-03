//alert('Olá')

let num1 = parseFloat(window.prompt('Digite um número:'))
let num2 = parseFloat(window.prompt('Digite outro número:'))
let operacao = window.prompt('Qual operação deseja realizar: adição digite:'+ '+ \n subtração digite - \n multiplicação digite: *\n divisão digite /'+ 'módulo digite %')

if(operacao =='+'){
    let result = num1+num2
    alert(result)
}
else if(operacao =='-'){
    let result = num1-num2
    alert(result)
}
else if(operacao =='*'){
    let result = num1*num2
    alert(result)
}
else if(operacao =='/'){
    let result = num1/num2
    alert(result)
}
else if(operacao =='%'){
    let result = num1%num2
    alert(result)
}
else{
    alert('Opção invalida')
}

55