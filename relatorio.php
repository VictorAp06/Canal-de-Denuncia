<?php
session_start();
include('conexao.php');

    $codigo = $_SESSION['encontrado'];
    mysqli_set_charset( $conexao, 'utf8');
    $sql = "select * from denuncia where codigo = '{$codigo}';";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
    
    foreach($dados as $key => $aux){
        if($aux == ""){
            $dados[$key] = "Não informado";
        }
    }

    $conexao->close();
    
    require 'vendor/autoload.php';

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $idade_maior = $dados['idade_maior'];
    $identificacao = $dados['identificacao'];
    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $endereco = $dados['endereco'];
    $bairro = $dados['bairro'];
    $complemento = $dados['complemento'];
    $cidade = $dados['cidade'];
    $uf = $dados['uf'];
    $email = $dados['email'];
    $telefone = $dados['telefone'];
    $integrante_fau = $dados['integrante_fau'];
    $setor = $dados['setor'];
    $denunciado_relacao_fau = $dados['denunciado_relacao_fau'];
    $laboratorio = $dados['laboratorio'];
    $nome_projeto = $dados['nome_projeto'];
    $nome_denunciado = $dados['nome_denunciado'];
    $denuncia = $dados['denuncia'];
    $data_denuncia = $dados['data_denuncia'];
    $dompdf->loadhtml('
    <html lang="pt-BR">
    <head>
    <meta charset="UTF-8">
 
    <style>

    body {
        padding: 2rem;
        position: relative;
    }
    p{  
        font-weight: bold;
        margin-bottom: 0.3rem;
        font-size: 1rem;
        font-family: Arial, Helvetica, sans-serif;
    }
    fieldset{
        margin: 1rem;
        font-size: 1.1em;
        font-family: Arial, Helvetica, sans-serif;
    }
    h1{
        text-align: center;
    }
    h2{
        text-align: center;
    }
    .resposta{
        font-weight: 550;
        padding: 0;
        margin-top: 0;
        margin-left: 1rem;
        font-size: 0.9rem;
        font-family: Arial, Helvetica, sans-serif;
    }
    table{
        position: center;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    tr {
        margin-right: 1rem;
        text-align: left;
    }
    td{
        width: 100%;
    }
    </style>
        <title>Relatorio de Denuncia</title>
    </head>
    <body>

        <table>
            <tr>
                <td>
                <img src="data:image/jpeg;base64,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LUV4aXYyIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6aXB0Y0V4dD0iaHR0cDovL2lwdGMub3JnL3N0ZC9JcHRjNHhtcEV4dC8yMDA4LTAyLTI5LyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtbG5zOnBsdXM9Imh0dHA6Ly9ucy51c2VwbHVzLm9yZy9sZGYveG1wLzEuMC8iIHhtbG5zOkdJTVA9Imh0dHA6Ly93d3cuZ2ltcC5vcmcveG1wLyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9ImdpbXA6ZG9jaWQ6Z2ltcDpiYzA0NjAwNi1jYzA4LTQwMWItYjU5MC00YmJiNWFlZTRhODEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTYzNTlmOGYtNTIxYi00NzgwLWI2NzUtYjJiNjBiNTQwY2Q5IiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6ZTRjNDBiMjgtMTUwMS00N2ZhLWEwNjAtNGM0NTM1M2FiNjEyIiBHSU1QOkFQST0iMi4wIiBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIiBHSU1QOlRpbWVTdGFtcD0iMTYyMzkzNjU1OTE4OTI1NyIgR0lNUDpWZXJzaW9uPSIyLjEwLjIyIiBkYzpGb3JtYXQ9ImltYWdlL2pwZWciIHhtcDpDcmVhdG9yVG9vbD0iR0lNUCAyLjEwIj4gPGlwdGNFeHQ6TG9jYXRpb25DcmVhdGVkPiA8cmRmOkJhZy8+IDwvaXB0Y0V4dDpMb2NhdGlvbkNyZWF0ZWQ+IDxpcHRjRXh0OkxvY2F0aW9uU2hvd24+IDxyZGY6QmFnLz4gPC9pcHRjRXh0OkxvY2F0aW9uU2hvd24+IDxpcHRjRXh0OkFydHdvcmtPck9iamVjdD4gPHJkZjpCYWcvPiA8L2lwdGNFeHQ6QXJ0d29ya09yT2JqZWN0PiA8aXB0Y0V4dDpSZWdpc3RyeUlkPiA8cmRmOkJhZy8+IDwvaXB0Y0V4dDpSZWdpc3RyeUlkPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6Y2hhbmdlZD0iLyIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo3MWM4ODQ2Yy05NWEzLTQyYzItOTlkZS0yZWE2OGY0ZjFhNzYiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkdpbXAgMi4xMCAoV2luZG93cykiIHN0RXZ0OndoZW49IjIwMjEtMDYtMTdUMTA6Mjk6MTkiLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDxwbHVzOkltYWdlU3VwcGxpZXI+IDxyZGY6U2VxLz4gPC9wbHVzOkltYWdlU3VwcGxpZXI+IDxwbHVzOkltYWdlQ3JlYXRvcj4gPHJkZjpTZXEvPiA8L3BsdXM6SW1hZ2VDcmVhdG9yPiA8cGx1czpDb3B5cmlnaHRPd25lcj4gPHJkZjpTZXEvPiA8L3BsdXM6Q29weXJpZ2h0T3duZXI+IDxwbHVzOkxpY2Vuc29yPiA8cmRmOlNlcS8+IDwvcGx1czpMaWNlbnNvcj4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPD94cGFja2V0IGVuZD0idyI/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" alt="" />
                </td>
                <td>
                    <p align="right" class="resposta">Rua Francisco Vicente Ferreira, <br>126
                    Santa Mônica, <br>Uberlândia-MG
                    38408-102
                    </p>
                </td>
            </tr>
        </table>
        <h1>Relatório de Denúncia</h1>
        <table>
            <tr>
                <td><p>Número protocolo de denúncia: </p><p class="resposta"> '.$codigo.'</p></td>
                <td><p>Denunciante identificado: </p><p class="resposta"> '.$identificacao.'</p></td>
            </tr>
            <tr>
                <td><p>Data de efetivação da denúncia: </p><p class="resposta"> '.$data_denuncia.'</p></td>
            </tr>
        </table>
        <hr>
        <h2>Identificação</h2>
        <table cellspacing="0">
            <tr>
                <td><p>Nome: </p><p class="resposta">'.$nome.'</p></td>
                <td><p>CPF: </p><p class="resposta">'.$cpf.'</p></td>
            </tr>
            <tr>
                <td><p>Endereço: <p class="resposta">'.$endereco.'</p></td> 
                <td><p>Bairro: <p class="resposta">'.$bairro.'</p></p></td>
            </tr>
            <tr>
                <td><p>Complemento: <p class="resposta">'.$complemento.'</p></p></td>
                <td><p>Cidade: <p class="resposta">'.$cidade.'</p></p></td>
            </tr>
            <tr>
                <td><p>Estado: <p class="resposta">'.$uf.'</p></p></td>
                <td><p>Email: <p class="resposta">'.$email.'</p></p></td>
            </tr>
            <tr>
                <td><p>Telefone: <p class="resposta">'.$telefone.'</p></p></td>
            </tr>
        </table>
        <hr>
        <table cellspacing="0">
            <tr>
                <td><h2>Relação do denunciado com a Fundação</h2></td>
            </tr
            <tr>
                <td><p>O denunciado é integrante da FAU? <p class="resposta"> '.$integrante_fau.'</p></p></td>
            </tr>
            <tr>
                <td><p>Setor que o denunciado trabalha na FAU: <p class="resposta">'.$setor.'</p></p></td>
            </tr>
            <tr>
                <td><p>Relação do denunciado com a FAU: <p class="resposta">'.$denunciado_relacao_fau.'</p></p></td>
            </tr>
            <tr>
                <td><p>Laboratório: <p class="resposta">'.$laboratorio.'</p></p></td>
            </tr>
            <tr>
                <td><p>Nome do projeto: <p class="resposta">'.$nome_projeto.'</p></p></td>
            </tr>
            <tr>
                <td><p>Nome do denunciado: <p class="resposta">'.$nome_denunciado.'</p></p></td>
            </tr>
        </table>
        <hr>
        <h2>Denúncia</h2> 
        <p><fieldset>'.$denuncia.'</fieldset></p>

    </body>
    </html>
    ');
    $dompdf->render();
    $dompdf->stream("relatorio.pdf",array("Attachment"=>false));
    
?>