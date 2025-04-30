// Objeto para armazenar os valores calculados
const valoresCalculados = {
    saldos: {},
    status: {}
};

// Função para salvar os dados no banco de dados
async function salvarDados(mes, salario, gastos, saldo, status) {
    try {
        const response = await fetch('salvar_dados.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                mes: mes,
                salario: salario,
                gastos: gastos,
                saldo: saldo,
                status: status
            })
        });
        
        const data = await response.json();
        if (data.success) {
            console.log('Dados salvos com sucesso!');
        } else {
            console.error('Erro ao salvar dados:', data.message);
        }
    } catch (error) {
        console.error('Erro ao salvar dados:', error);
    }
}

// Função para carregar os dados do banco de dados
async function carregarDados(mes) {
    try {
        const response = await fetch(`buscar_dados.php?mes=${mes}`);
        const data = await response.json();
        
        if (data.success) {
            document.getElementById(`sl${mes}`).value = data.salario;
            document.getElementById(`gm${mes}`).value = data.gastos;
            calcularMes(mes);
        }
    } catch (error) {
        console.error('Erro ao carregar dados:', error);
    }
}

function calcularm1() {
    var m1 = parseFloat(document.getElementById("sl1").value) || 0;
    var g1 = parseFloat(document.getElementById("gm1").value) || 0;
    var sm1 = m1 - g1;
    var l = "Janeiro";
    
    // Armazenar os valores calculados
    valoresCalculados.saldos[1] = sm1;
    valoresCalculados.status[1] = sm1 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm1 > 0) {
        document.querySelector("#r1").innerHTML = `Você está com um saldo positivo de: R$ ${sm1.toFixed(2)}`;
    } else {
        document.querySelector("#r1").innerHTML = `Você está com um saldo negativo de: R$ ${sm1.toFixed(2)}`;
    }
    
    // Salvar os dados no banco
    salvarDados(1, m1, g1, sm1, valoresCalculados.status[1]);
}

function calcularm2() {
    var m2 = parseFloat(document.getElementById("sl2").value) || 0;
    var g2 = parseFloat(document.getElementById("gm2").value) || 0;
    var sm2 = m2 - g2;
    var l2 = "Fevereiro";
    
    valoresCalculados.saldos[2] = sm2;
    valoresCalculados.status[2] = sm2 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm2 > 0) {
        document.querySelector("#r2").innerHTML = `Você está com um saldo positivo de: R$ ${sm2.toFixed(2)}`;
    } else {
        document.querySelector("#r2").innerHTML = `Você está com um saldo negativo de: R$ ${sm2.toFixed(2)}`;
    }
}

function calcularm3() {
    var m3 = parseFloat(document.getElementById("sl3").value) || 0;
    var g3 = parseFloat(document.getElementById("gm3").value) || 0;
    var sm3 = m3 - g3;
    var l3 = "Março";

    valoresCalculados.saldos[3] = sm3;
    valoresCalculados.status[3] = sm3 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm3 > 0) {
        document.querySelector("#r3").innerHTML = `Você está com um saldo positivo de: R$ ${sm3.toFixed(2)}`;
    } else {
        document.querySelector("#r3").innerHTML = `Você está com um saldo negativo de: R$ ${sm3.toFixed(2)}`;
    }
}

function calcularm4() {
    var m4 = parseFloat(document.getElementById("sl4").value) || 0;
    var g4 = parseFloat(document.getElementById("gm4").value) || 0;
    var sm4 = m4 - g4;
    
    valoresCalculados.saldos[4] = sm4;
    valoresCalculados.status[4] = sm4 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm4 > 0) {
        document.querySelector("#r4").innerHTML = `Você está com um saldo positivo de: R$ ${sm4.toFixed(2)}`;
    } else {
        document.querySelector("#r4").innerHTML = `Você está com um saldo negativo de: R$ ${sm4.toFixed(2)}`;
    }
}

function calcularm5() {
    var m5 = parseFloat(document.getElementById("sl5").value) || 0;
    var g5 = parseFloat(document.getElementById("gm5").value) || 0;
    var sm5 = m5 - g5;
    
    valoresCalculados.saldos[5] = sm5;
    valoresCalculados.status[5] = sm5 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm5 > 0) {
        document.querySelector("#r5").innerHTML = `Você está com um saldo positivo de: R$ ${sm5.toFixed(2)}`;
    } else {
        document.querySelector("#r5").innerHTML = `Você está com um saldo negativo de: R$ ${sm5.toFixed(2)}`;
    }
}

function calcularm6() {
    var m6 = parseFloat(document.getElementById("sl6").value) || 0;
    var g6 = parseFloat(document.getElementById("gm6").value) || 0;
    var sm6 = m6 - g6;
    
    valoresCalculados.saldos[6] = sm6;
    valoresCalculados.status[6] = sm6 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm6 > 0) {
        document.querySelector("#r6").innerHTML = `Você está com um saldo positivo de: R$ ${sm6.toFixed(2)}`;
    } else {
        document.querySelector("#r6").innerHTML = `Você está com um saldo negativo de: R$ ${sm6.toFixed(2)}`;
    }
}

function calcularm7() {
    var m7 = parseFloat(document.getElementById("sl7").value) || 0;
    var g7 = parseFloat(document.getElementById("gm7").value) || 0;
    var sm7 = m7 - g7;
    
    valoresCalculados.saldos[7] = sm7;
    valoresCalculados.status[7] = sm7 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm7 > 0) {
        document.querySelector("#r7").innerHTML = `Você está com um saldo positivo de: R$ ${sm7.toFixed(2)}`;
    } else {
        document.querySelector("#r7").innerHTML = `Você está com um saldo negativo de: R$ ${sm7.toFixed(2)}`;
    }
}

function calcularm8() {
    var m8 = parseFloat(document.getElementById("sl8").value) || 0;
    var g8 = parseFloat(document.getElementById("gm8").value) || 0;
    var sm8 = m8 - g8;
    
    valoresCalculados.saldos[8] = sm8;
    valoresCalculados.status[8] = sm8 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm8 > 0) {
        document.querySelector("#r8").innerHTML = `Você está com um saldo positivo de: R$ ${sm8.toFixed(2)}`;
    } else {
        document.querySelector("#r8").innerHTML = `Você está com um saldo negativo de: R$ ${sm8.toFixed(2)}`;
    }
}

function calcularm9() {
    var m9 = parseFloat(document.getElementById("sl9").value) || 0;
    var g9 = parseFloat(document.getElementById("gm9").value) || 0;
    var sm9 = m9 - g9;
    
    valoresCalculados.saldos[9] = sm9;
    valoresCalculados.status[9] = sm9 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm9 > 0) {
        document.querySelector("#r9").innerHTML = `Você está com um saldo positivo de: R$ ${sm9.toFixed(2)}`;
    } else {
        document.querySelector("#r9").innerHTML = `Você está com um saldo negativo de: R$ ${sm9.toFixed(2)}`;
    }
}

function calcularm10() {
    var m10 = parseFloat(document.getElementById("sl10").value) || 0;
    var g10 = parseFloat(document.getElementById("gm10").value) || 0;
    var sm10 = m10 - g10;
    
    valoresCalculados.saldos[10] = sm10;
    valoresCalculados.status[10] = sm10 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm10 > 0) {
        document.querySelector("#r10").innerHTML = `Você está com um saldo positivo de: R$ ${sm10.toFixed(2)}`;
    } else {
        document.querySelector("#r10").innerHTML = `Você está com um saldo negativo de: R$ ${sm10.toFixed(2)}`;
    }
}

function calcularm11() {
    var m11 = parseFloat(document.getElementById("sl11").value) || 0;
    var g11 = parseFloat(document.getElementById("gm11").value) || 0;
    var sm11 = m11 - g11;
    
    valoresCalculados.saldos[11] = sm11;
    valoresCalculados.status[11] = sm11 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm11 > 0) {
        document.querySelector("#r11").innerHTML = `Você está com um saldo positivo de: R$ ${sm11.toFixed(2)}`;
    } else {
        document.querySelector("#r11").innerHTML = `Você está com um saldo negativo de: R$ ${sm11.toFixed(2)}`;
    }
}

function calcularm12() {
    var m12 = parseFloat(document.getElementById("sl12").value) || 0;
    var g12 = parseFloat(document.getElementById("gm12").value) || 0;
    var sm12 = m12 - g12;
    
    valoresCalculados.saldos[12] = sm12;
    valoresCalculados.status[12] = sm12 >= 0 ? 'Positivo' : 'Negativo';
    
    if (sm12 > 0) {
        document.querySelector("#r12").innerHTML = `Você está com um saldo positivo de: R$ ${sm12.toFixed(2)}`;
    } else {
        document.querySelector("#r12").innerHTML = `Você está com um saldo negativo de: R$ ${sm12.toFixed(2)}`;
    }
}

// Função para calcular todos os meses
function calcularTodos() {
    for (let i = 1; i <= 12; i++) {
        window[`calcularm${i}`]();
    }
}

// Adicionar evento para calcular todos os meses antes de enviar o formulário
document.getElementById('formPrincipal').addEventListener('submit', function(e) {
    calcularTodos();
});

// Adicionar evento para carregar dados ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    for (let i = 1; i <= 12; i++) {
        carregarDados(i);
    }
});
