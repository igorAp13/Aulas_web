let num = parseFloat(window.prompt('Digite um Número pra saber se ele é par ou impar:'))
outnum = num % 10

if(outnum == 0 || outnum == 2 || outnum == 4 || outnum == 6 || outnum == 8){
    alert('Esse número é par')
}

else{
    alert('Esse número é impar')
}

