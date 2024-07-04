let numA = parseFloat(window.prompt('Digite o Valor de A:'))


if (/^[0-9.,]+$/.test(numA)) {
    let numB = parseFloat(window.prompt('Digite o Valor de b:'))

    if (/^[0-9.,]+$/.test(numB)) {
        if (numA > numB) {
            alert('B é menor que A')
        }
        else if (numA < numB) {
            alert('B é maior que A')
        }

        else if (numA == numB) {
            alert('B é igual que A')
        }
    }

    else {
        alert("DIGITOU CARACTERE")
    }
}

else {
    alert("DIGITOU CARACTERE")
}


