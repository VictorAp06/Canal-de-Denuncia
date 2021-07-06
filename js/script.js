function exibirID(el) {
    document.querySelector(el).classList.add('mostrar');
}

function ocultarID(el) {
    document.querySelector(el).classList.remove('mostrar');
}

function exibir_relacao(el) {
    document.querySelector(el).classList.add('mostrar');
    document.querySelector('.denunciado-relacao-fau').classList.remove('mostrar');
    document.querySelector('.relacao-projeto').classList.remove('mostrar');
    document.querySelector('.denuncia').classList.add('mostrar');
}

function ocultar_relacao(el) {
    document.querySelector(el).classList.remove('mostrar');
    document.querySelector('.denunciado-relacao-fau').classList.add('mostrar');
}

function exibirRelacaoProjeto(el) {
    document.querySelector(el).classList.add('mostrar');
    document.querySelector('.denuncia').classList.add('mostrar');
}

function ocultarRelacaoProjeto(el) {
    document.querySelector(el).classList.remove('mostrar');
    document.querySelector('.denuncia').classList.add('mostrar');
}

function RemoveMask(strValue) {
    campo_remove = strValue.value;
    
	campo_remove = campo_remove.replace(".", "");
	campo_remove = campo_remove.replace(".", "");
	campo_remove = campo_remove.replace("-", "");
	campo_remove = campo_remove.replace("/", "");
	campo_remove = campo_remove.replace("/", "");

    return campo_remove;
}

function TestaCPF(strCPF) {
    
    var Soma;
    var Resto;
    Soma = 0; 
    var cpf = RemoveMask(strCPF);
    if (cpf == "00000000000")
	    return 0;
    for (i=1; i<=9; i++)
        Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i); 
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11)) 
	    Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10)) )
	    return 0;
	    Soma = 0;
    
    for (i = 1; i <= 10; i++)
       Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    
    if ((Resto == 10) || (Resto == 11)) 
	    Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11) ) )
        return 0;
    return 1;
}

function validaIdentidade(){

    var nome = document.getElementById('nome');
    var cpf = document.getElementById('cpf');
    var cidade = document.getElementById('cidade');
    var estados = document.getElementById('estados-brasil');
    var endereco = document.getElementById('endereco');
    var bairro = document.getElementById('bairro');
    var complemento = document.getElementById('complemento');
    var telefone = document.getElementById('telefone');
    var email = document.getElementById('email');
    var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var erro = 0;

    campo_nome = document.querySelector('.msg-nome');
    if(nome.value == '') {
      campo_nome.style.display = '';
      campo_nome.innerHTML = "Favor preencher o nome";
      erro += 1;
    } else {
      campo_nome.style.display = 'none';
    }

    campo_cpf = document.querySelector('.msg-cpf');
    if(cpf.value == '') {
      campo_cpf.style.display = '';
      campo_cpf.innerHTML = "Favor preencher o CPF";
      erro += 1;
    } else {
      var ret_cpf = TestaCPF(cpf);
      if(ret_cpf == 1){
        campo_cpf.style.display = 'none';
      } else {
        campo_cpf.style.display = '';
        campo_cpf.innerHTML = "CPF inválido";
        erro += 1;
      }
    }  

    campo_cidade = document.querySelector('.msg-cidade');
    if(cidade.value == '') {
      campo_cidade.style.display = '';
      campo_cidade.innerHTML = "Favor preencher a cidade de nascimento";
      erro += 1;
    } else {
      campo_cidade.style.display = 'none';
    }

    campo_endereco = document.querySelector('.msg-endereco');
    if(endereco.value == '') {
        campo_endereco.style.display = '';
        campo_endereco.innerHTML = "Favor preencher o endereço";
        erro += 1;
    } else {
        campo_endereco.style.display = 'none';
    }
    
    campo_bairro = document.querySelector('.msg-bairro');
    if(bairro.value == '') {
        campo_bairro.style.display = '';
        campo_bairro.innerHTML = "Favor preencher o bairro";
        erro += 1;
    } else {
        campo_bairro.style.display = 'none';
    }
    
    campo_complemento = document.querySelector('.msg-complemento');
    if(complemento.value == '') {
        campo_complemento.style.display = '';
        campo_complemento.innerHTML = "Favor preencher o complemento";
        erro += 1;
    } else {
        campo_complemento.style.display = 'none';
    }
    
    campo_estados = document.querySelector('.msg-estados');
    if( estados.value == 'Selecione') {
      campo_estados.style.display = '';
      campo_estados.innerHTML = "Favor selecionar UF";
      erro += 1;
    } else {
      campo_estados.style.display = 'none';
    }

    caixa_email = document.querySelector('.msg-email');
    if(email.value == ''){
        caixa_email.style.display = '';
        caixa_email.innerHTML = "Favor preencher o E-mail";
        erro += 1;
    }else if(filtro.test(email.value)){
      caixa_email.style.display = 'none';
    }else{
      caixa_email.innerHTML = "Formato do E-mail inválido";
      caixa_email.style.display = 'none';
      erro += 1;
    }
    
    campo_telefone = document.querySelector('.msg-telefone');
    if(telefone.value == '') {
      campo_telefone.style.display = '';
      campo_telefone.innerHTML = "Favor adicionar o telefone";
      erro += 1;
    } else {
      campo_telefone.style.display = 'none';
    }
    return erro;
}

function validaDenuncia(){

    var nome_denunciado = document.getElementById('nome-denunciado');
    var denuncia = document.getElementById('denuncia');
    var erro = 0;

    campo_nome_denunciado = document.querySelector('.msg-nome-denunciado');
    if(nome_denunciado.value == '') {
      campo_nome_denunciado.style.display = '';
      campo_nome_denunciado.innerHTML = "Favor preencher o nome-denunciado";
      erro += 1;
    } else {
      campo_nome_denunciado.style.display = 'none';
    }

    campo_denuncia = document.querySelector('.msg-denuncia');
    if(denuncia.value == '') {
      campo_denuncia.style.display = '';
      campo_denuncia.innerHTML = "Este campo não pode ficar vazio";
      erro += 1;
    } else {
      campo_denuncia.style.display = 'none';
    }

    return erro;
}

function validaRelacaoDenuncia(){
    
    var laboratorio = document.getElementById('laboratorio');
    var projeto = document.getElementById('projeto');
    var erro = 0;

    campo_laboratorio = document.querySelector('.msg-laboratorio');
    if(laboratorio.value == '') {
      campo_laboratorio.style.display = '';
      campo_laboratorio.innerHTML = "Favor preencher o laboratório";
      erro += 1;
    } else {
      campo_laboratorio.style.display = 'none';
    }

    campo_projeto = document.querySelector('.msg-projeto');
    if(projeto.value == '') {
      campo_projeto.style.display = '';
      campo_projeto.innerHTML = "Este campo não pode ficar vazio";
      erro += 1;
    } else {
      campo_projeto.style.display = 'none';
    }

    return erro;
}

function validaCadastro(){

    var erro = 0;

    /*var radios = document.getElementsByName('rd-inicio');
    campo_busca = document.querySelector('.msg-inicio');
    var aux = 0;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
          aux = 1;
        } 
    }
    if(aux == 0){
        campo_busca.style.display = '';
        campo_busca.innerHTML = "Campo obrigatório.";
        erro += 1;
    } else {
        campo_busca.style.display = 'none';
    }*/

    var op_idade = document.getElementsByName('rd-idade');
    campo_idade = document.querySelector('.msg-idade');
    var aux = 0;
    for (var i = 0; i < op_idade.length; i++) {
        if (op_idade[i].checked) {
          aux = 1;
        } 
    }
    if(aux == 0){
        campo_idade.style.display = '';
        campo_idade.innerHTML = "Campo obrigatório.";
        erro += 1;
    } else {
        campo_idade.style.display = 'none';
    }

    var op_identidade = document.getElementsByName('rd-identidade');
    campo_identidade = document.querySelector('.msg-identidade');
    var aux1 = 0;
    
    if (op_identidade[0].checked) {
        aux1 = 1;
        aux2 = validaIdentidade();
        if(aux2 != 0){
            erro += 1;
        }
    } else if(op_identidade[1].checked){
        aux1 = 1;
    }

    if(aux1 == 0){
        campo_identidade.style.display = '';
        campo_identidade.innerHTML = "Campo obrigatório.";
        erro += 1;
    } else {
        campo_identidade.style.display = 'none';
    }

    var op_integrante_fau = document.getElementsByName('rd-integrante-fau');
    campo_integrante_fau = document.querySelector('.msg-integrante-fau');
    var aux = 0;

    if (op_integrante_fau[0].checked) {
        aux = 1;
        var setor_fau = document.getElementById('setor-fau');
        campo_setor_fau = document.querySelector('.msg-setor-fau');

        if(setor_fau.value == 'Selecione') {
          campo_setor_fau.style.display = '';
          campo_setor_fau.innerHTML = "Favor selecionar o setor";
          erro += 1;
        } else {
          campo_setor_fau.style.display = 'none';
        }

        aux3 = validaDenuncia();
        if(aux3 != 0){
            erro += 1;
        }
    } else if(op_integrante_fau[1].checked){
        aux = 1;

        var op_relacao_fau = document.getElementsByName('rd-relacionado-fau');
        campo_relacao_fau = document.querySelector('.msg-denunciado-relacao-fau');
        var aux1 = 0;
        
        if (op_relacao_fau[1].checked) {
            aux1 = 1;
            aux3 = validaDenuncia();
            aux4 = validaRelacaoDenuncia();
            if(aux3 != 0 || aux4 != 0){
                erro += 1;
            }
        } else if(op_relacao_fau[2].checked || op_relacao_fau[3].checked){
            aux1 = 1;
            aux3 = validaDenuncia();
            if(aux3 != 0){
                erro += 1;
            }
        }
    
        if(aux1 == 0){
            campo_relacao_fau.style.display = '';
            campo_relacao_fau.innerHTML = "Campo obrigatório.";
            erro += 1;
        } else {
            campo_relacao_fau.style.display = 'none';
        }
    }

    if(aux == 0){
        campo_integrante_fau.style.display = '';
        campo_integrante_fau.innerHTML = "Campo obrigatório.";
        erro += 1;
    } else {
        campo_integrante_fau.style.display = 'none';
    }

    if(erro > 0){
        return false;
      } else if(erro == 0){
        return true;
    }
}