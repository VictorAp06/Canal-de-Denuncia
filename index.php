<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <title>Canal de Denúncia - FAU</title>
</head>
<body class="bg-img">
        <div class="main-container">
        <h1>FAU - Canal de Denúncia</h1>
            <form id="busca" action="buscar.php" method="POST">
                <div class="campo">
                    <h3>Você já possui uma denúncia? Insira o número de pedido para imprimir o relatório</h3>
                </div>
                <div class="campo-denuncia" id="campo-busca">
                    <label for="num_denuncia">Número de protocolo da denúncia</label>
                    <input type="text" name="num_denuncia" id="num_denuncia" class="form__field" maxlength="100" placeholder="Nº da denúncia">
                    <input type="submit" name="btn-buscar" id="btn-buscar" class="btn-submit" value="Buscar">
                </div>
            </form>
            <h1>Formulário de Denúncia</h1>
            <form id="cadastro" action="cadastrar.php" method="POST">
                <div class="campo">
                    <h3>Você é maior de idade?</h3>
                    <div class="rd-inicio">
                        <label>
                            <input type="radio" name="rd-idade" value="Sim">Sim
                        </label>
                        <label>
                            <input type="radio" name="rd-idade" value="Não">Não
                        </label>
                    </div>
                    <span class="msg-erro msg-idade"></span>
                </div>
                <div class="campo">
                    <h3>Identificação - Se identificar é importante para tornar este canal mais eficiente.</h3>
                    <div class="rd-inicio">
                        <label>
                            <input type="radio" name="rd-identidade" value="Sim" onclick="exibirID('.identidade')">Sim, quero me identificar
                        </label>
                        <label>
                            <input type="radio" name="rd-identidade" value="Não" onclick="ocultarID('.identidade')">Não quero me identificar (anônimo)
                        </label>
                    </div>
                    <span class="msg-erro msg-identidade"></span>
                </div>
                <section class="identidade">
                <div class="campo">
                    <h3>Identificação</h3>
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" id="nome" class="form__field" maxlength="75" placeholder="Digite seu nome">
                    <span class="msg-erro msg-nome"></span>
                </div>
                <div class="campo">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form__field" autocomplete="off" maxlength="14" placeholder="000.000.000-00">
                    <span class="msg-erro msg-cpf"></span>
                </div>
                <div class="campo">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form__field" maxlength="50" placeholder="Logradouro">
                    <span class='msg-erro msg-endereco'></span>
                </div>
                <div class="campo">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form__field" maxlength="50" placeholder="Digite o bairro">
                    <span class='msg-erro msg-bairro'></span>
                </div>
                <div class="campo">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" id="complemento" class="form__field" maxlength="30" placeholder="Bloco, apartamento, quadra">
                    <span class='msg-erro msg-complemento'></span>
                </div>
                <div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form__field" maxlength="50" placeholder="Digite o nome da sua cidade">
                    <span class='msg-erro msg-cidade'></span>
                </div>
                <div class="campo">
                    <label for="estados-brasil">UF</label>
                    <select name="estados-brasil" id="estados-brasil" class="form__field">
                        <option value="Selecione" selected>Selecione</option>
                        <option value="Acre">Acre</option>
                        <option value="Alagoas">Alagoas</option>
                        <option value="Amapá">Amapá</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Bahia">Bahia</option>
                        <option value="Ceará">Ceará</option>
                        <option value="Distrito Federal">Distrito Federal</option>
                        <option value="Espírito">Espírito Santo</option>
                        <option value="Goiás">Goiás</option>
                        <option value="Maranhão">Maranhão</option>
                        <option value="Mato Grosso">Mato Grosso</option>
                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                        <option value="Minas Gerais">Minas Gerais</option>
                        <option value="Pará">Pará</option>
                        <option value="Paraíba">Paraíba</option>
                        <option value="Paraná">Paraná</option>
                        <option value="Pernambuco">Pernambuco</option>
                        <option value="Piauí">Piauí</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        <option value="Rondônia">Rondônia</option>
                        <option value="Roraima">Roraima</option>
                        <option value="Santa Catarina">Santa Catarina</option>
                        <option value="São Paulo">São Paulo</option>
                        <option value="Sergipe">Sergipe</option>
                        <option value="Tocantins">Tocantins</option>
                    </select>
                    <span class='msg-erro msg-estados'></span>
                </div>
                <div class="campo">
                    <h3>Contato</h3>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form__field" maxlength="30" placeholder="Digite seu email">
                    <span class='msg-erro msg-email'></span>
                </div>
                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form__field" maxlength="15" placeholder="(00) 00000-0000">
                    <span class='msg-erro msg-telefone'></span>
                </div>
                </section>
                <div class="campo">
                    <h3>O denunciado é integrante da FAU?</h3>
                    <div class="rd-inicio">
                        <label>
                            <input type="radio" name="rd-integrante-fau" value="Sim" onclick="exibir_relacao('.integrante-fau')">Sim
                        </label>
                        <label>
                            <input type="radio" name="rd-integrante-fau" value="Não" onclick="ocultar_relacao('.integrante-fau')">Não
                        </label>
                        <span class="msg-erro msg-integrante-fau"></span>
                    </div> 
                </div>
                <section class="integrante-fau">
                    <div class="campo">
                        <label for="setor-fau">Selecione o setor do qual ele faz parte</label>
                        <select name="setor-fau" id="setor-fau" class="form__field">
                            <option value="Selecione" selected>Selecione</option>
                            <option value="Diretoria Executiva">Diretoria Executiva</option>
                            <option value="Assessoria Jurídica">Assesoria Jurídica</option>
                            <option value="Expansão">Expansão</option>
                            <option value="Gestão de Projetos">Gestão de Projetos</option>
                            <option value="Compras e Importação">Compras e Importação</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="Contabilidade">Contabilidade</option>
                            <option value="Recursos Humanos">Recursos Humanos</option>
                            <option value="Tecnologia da Informação">Tecnologia da Informação</option>
                            <option value="Não sei o setor">*Não sei o setor</option>
                        </select>
                        <span class='msg-erro msg-setor-fau'></span>
                    </div>
                </section>
                <section class="denunciado-relacao-fau">
                <div class="campo">
                        <h3>O denunciado faz parte de algum projeto de pesquisa relacionado a FAU?</h3>
                        <div class="rd-inicio">
                            <label>
                                <input type="hidden" name="rd-relacionado-fau" value="" checked>
                                <input type="radio" name="rd-relacionado-fau" value="Sim" onclick="exibirRelacaoProjeto('.relacao-projeto')">Sim
                            </label>
                            <label>
                                <input type="radio" name="rd-relacionado-fau" value="Não" onclick="ocultarRelacaoProjeto('.relacao-projeto')">Não
                            </label>
                            <label>
                                <input type="radio" name="rd-relacionado-fau" value="Não Sei" onclick="ocultarRelacaoProjeto('.relacao-projeto')">Não sei
                            </label>
                            <span class="msg-erro msg-denunciado-relacao-fau"></span>
                        </div> 
                    </div>
                </section>
                <section class="relacao-projeto">
                        <div class="campo">
                            <label for="laboratorio">Laboratório</label>
                            <input type="text" name="laboratorio" id="laboratorio" class="form__field" maxlength="75" placeholder="Digite o nome do laboratório">
                            <span class='msg-erro msg-laboratorio'></span>
                        </div>
                        <div class="campo">
                            <label for="projeto">Nome do Projeto</label>
                            <input type="text" name="projeto" id="projeto" class="form__field" maxlength="75" placeholder="Digite o nome do projeto">
                            <span class='msg-erro msg-projeto'></span>
                        </div>
                </section>
                <section class="denuncia">
                        <div class="campo">
                            <label for="nome-denunciado">Nome do denunciado</label>
                            <input type="text" name="nome-denunciado" id="nome-denunciado" class="form__field" maxlength="75" placeholder="Digite o nome do denunciado">
                            <span class='msg-erro msg-nome-denunciado'></span>
                        </div>
                        <div class="campo">
                            <label for="denuncia">Denúncia</label>
                            <textarea name="denuncia" id="denuncia" maxlength="1000" placeholder="Escreva com detalhes sua denúncia"></textarea>
                            <span class='msg-erro msg-denuncia'></span>
                        </div>
                </section>
                <input type="submit" name="btn-registrar" id="btn-registrar" class="btn-submit" value="Registrar">
            </form>
        </div>
    <script>
        $(document).ready(function () { 
            var $campoCpf = $("#cpf");
            $campoCpf.mask('000.000.000-00', {reverse: false});
        });

        $(document).ready(function () { 
            var $campoTelefone = $("#telefone");
            $campoTelefone.mask('(00)0000-00009', {reverse: false});
        });
    </script>
</body>
</html>