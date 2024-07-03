let idade = parseFloat(window.prompt('Digite sua idade:'))

if(idade < 16){
    alert('Não vota')
}
else if(idade >=18 && idade <=79){
    alert('Obrigatório')
}
else{
    alert('Opcional')
}