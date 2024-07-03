let sabor = window.prompt('Qual sabor do sorvete: \n m = morango'+ '\n b = baunilha \n c = chocolate \n u = uva')
.toLowerCase() //<= Função para deixar Minusculo, Quando o Úsuario digitar.
//.toUpperCase()<= Função para deixar Maiusculo, Quando o Úsuario digitar.

switch(sabor) {
    case 'm':
        alert('Valor R$12,00 o kilo')
        break
    case 'b':
        alert('Valor R$11,00 o kilo')
        break
    case 'c':
        alert('Valor R$18,00')
        break
    case 'u':
        alert('Valor R$15,00')
        break
    default:
        alert('opção invalida')
}