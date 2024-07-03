let viagem = window.prompt('Qual pacote de viagem deseja: \n l = 5 dias no litoral'+'\n g = 5 dias em gramado \n n = 5 dias em noronha').toLowerCase()
    
    function showAlert(message, callback){
        if(confirm(message)){
            callback()
        }
    }
    function bodyInfo(hotel, checkout){
        let infoDiv = document.getElementById('info')
        infoDiv.innerHTML = `<p>Hotel ${hotel}</p><p>Horario do checkout: ${checkout}</p>`
    }
switch(viagem) {
    case 'l':
        showAlert('R$850,00 o pacote',function(){
           bodyInfo('Hotel Do Mar','12:00') 
        })
        break
    case 'g':
        showAlert('R$7.850,00 o pacote',function(){
            bodyInfo('Hotel Grama','11:30') 
        })
        break
    case 'n':
        showAlert('R$11.000,00 o pacote',function(){
            bodyInfo('Hotel Do Nora','13:00') 
        })
        break
    default:
        alert('O valor será decidido de acordo com suas escolha')
}