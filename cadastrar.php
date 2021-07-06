<?php

    include('conexao.php');

    mysqli_set_charset($conexao, "utf8");
    $cadastrado = false;
    $idade_maior = mysqli_real_escape_string($conexao, $_POST['rd-idade']);
    $identificacao = mysqli_real_escape_string($conexao, $_POST['rd-identidade']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $uf = mysqli_real_escape_string($conexao, $_POST['estados-brasil']);
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $integrante_fau = mysqli_real_escape_string($conexao, $_POST['rd-integrante-fau']);
    $setor = mysqli_real_escape_string($conexao, $_POST['setor-fau']);
    $denunciado_relacao_fau = mysqli_real_escape_string($conexao, $_POST['rd-relacionado-fau']);
    $laboratorio = mysqli_real_escape_string($conexao, $_POST['laboratorio']);
    $nome_projeto = mysqli_real_escape_string($conexao, $_POST['projeto']);
    $nome_denunciado = mysqli_real_escape_string($conexao, $_POST['nome-denunciado']);
    $denuncia = mysqli_real_escape_string($conexao, $_POST['denuncia']);

    do{
        $codigo = rand(1000, 9999);
        $sql = "select codigo from denuncia where codigo = '$codigo';";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);
    } while($row != 0);

    if($identificacao == 'Sim'){

        if($integrante_fau == 'Sim'){

            $sql = "insert into denuncia (codigo, idade_maior, identificacao, nome, cpf, endereco, bairro, complemento, cidade, uf, email, telefone, integrante_fau, setor, nome_denunciado, denuncia, data_denuncia) values('$codigo', '$idade_maior', '$identificacao', '$nome', '$cpf', '$endereco', '$bairro', '$complemento', '$cidade', '$uf', '$email', '$telefone', '$integrante_fau', '$setor', '$nome_denunciado', '$denuncia', now());";

            if($conexao->query($sql) === TRUE){
                echo "New record created successfully.";
                $cadastrado = true;                 
            } else {
                echo "Error: " . $sql . "<br>" . $conexao->error;
            }

        } else if($integrante_fau == 'Não'){

            if($denunciado_relacao_fau == 'Sim'){

                $sql = "insert into denuncia (codigo, idade_maior, identificacao, nome, cpf, endereco, bairro, complemento, cidade, uf, email, telefone, integrante_fau, laboratorio, nome_projeto , nome_denunciado, denuncia, , data_denuncia) values('$codigo', '$idade_maior', '$identificacao', '$nome', '$cpf', '$endereco', '$bairro', '$complemento', '$cidade', '$uf', '$email', '$telefone', '$integrante_fau', '$laboratorio', '$nome_projeto', '$nome_denunciado', '$denuncia', now());";

                if($conexao->query($sql) === TRUE){
                    echo "New record created successfully.";
                    $cadastrado = true;
                } else {
                    echo "Error: " . $sql . "<br>" . $conexao->error;
                }

            } else if($denunciado_relacao_fau == 'Não' || $denunciado_relacao_fau == 'Não Sei'){

                $sql = "insert into denuncia (codigo, idade_maior, identificacao, nome, cpf, endereco, bairro, complemento, cidade, uf, email, telefone, integrante_fau, nome_denunciado, denuncia, , data_denuncia) values('$codigo', '$idade_maior', '$identificacao', '$nome', '$cpf', '$endereco', '$bairro', '$complemento', '$cidade', '$uf', '$email', '$telefone', '$integrante_fau', '$nome_denunciado', '$denuncia', now());";

                if($conexao->query($sql) === TRUE){
                    echo "New record created successfully.";
                    $cadastrado = true;
                } else {
                    echo "Error: " . $sql . "<br>" . $conexao->error;
                }

            }

        }

    } else if($identificacao == 'Não'){

        if($integrante_fau == 'Sim'){
            
            $sql = "insert into denuncia (codigo, idade_maior, identificacao, integrante_fau, setor, nome_denunciado, denuncia, data_denuncia) values('$codigo', '$idade_maior', '$identificacao', '$integrante_fau', '$setor', '$nome_denunciado', '$denuncia', now());";

            if($conexao->query($sql) === TRUE){
                echo "New record created successfully.";
                $cadastrado = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conexao->error;
            }

        } else if($integrante_fau == 'Não'){

            if($denunciado_relacao_fau == 'Sim'){

                $sql = "insert into denuncia (codigo, idade_maior, identificacao, integrante_fau, laboratorio, nome_projeto , nome_denunciado, denuncia, data_denuncia) values('$codigo', '$idade_maior', '$identificacao', '$integrante_fau', '$laboratorio', '$nome_projeto', '$nome_denunciado', '$denuncia', now());";

                if($conexao->query($sql) === TRUE){
                    echo "New record created successfully.";
                    $cadastrado = true;
                } else {
                    echo "Error: " . $sql . "<br>" . $conexao->error;
                }

            } else if($denunciado_relacao_fau == 'Não' || $denunciado_relacao_fau == 'Não Sei'){

                $sql = "insert into denuncia (codigo, idade_maior, identificacao, integrante_fau, nome_denunciado, denuncia, data_denuncia) values('$codigo', '$idade_maior', '$identificacao', '$integrante_fau', '$nome_denunciado', '$denuncia', now());";

                if($conexao->query($sql) === TRUE){
                    echo "New record created successfully.";
                    $cadastrado = true;
                } else {
                    echo "Error: " . $sql . "<br>" . $conexao->error;
                }

            }

        }
    
    }/*
    if($cadastrado == true){
        $_SESSION['cadastrado_sucesso'] = $codigo;
        header("location:envio_email.php");
        exit();
    } else {
        $_SESSION['nao_cadastrado'] = true;
        header('Location: index.php');
        exit();
    }*/
?>