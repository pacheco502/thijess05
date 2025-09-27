 <?php

##rotas de paginas (navegação do sistema)
//index.php?pagina
//exemplo> index.php?cliente
//pegar a url
// ROTAS DE PAGINAS (NAVEGAÇÃO)

#ROTAS DE ACAO
if (isset($_POST['login'])) {
    $objController = new Controller();
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $objController->validarLogin($email, $senha);
    exit; // <-- evita cair na navegação GET
}


//recuperar senha

// SOLICITAR RECUPERAÇÃO (envia link por e-mail)
if (isset($_POST['recuperar_senha'])) {
    $objController = new Controller();
    $email = htmlspecialchars($_POST['email']);
    $objController->recuperarSenha($email);
    exit;
}


// REDEFINIR SENHA (via token)
if (isset($_POST['redefinir_senha'])) {
    $objController = new Controller();
    $token     = $_POST['token'] ?? '';
    $nova      = $_POST['nova_senha'] ?? '';
    $confirmar = $_POST['confirmar_senha'] ?? '';
    $objController->processarResetSenha($token, $nova, $confirmar);
    exit;
}

//=========================================== CLIENTE ========================================================
// Inserir Cliente 

if (isset($_POST['verificar_cpf_cliente'])) {
    // DEBUG temporário
    //var_dump($_POST); exit;


    $objController = new Controller();

    $cpf = htmlspecialchars($_POST['cpf']);

    $objController->verificar_cpf_cliente($cpf);
}




if (isset($_POST['inserir_cliente'])) {
    //instanciar controller
    $objController = new Controller();

    // Dados do cliente
    $nome = htmlspecialchars($_POST['nome']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $email = htmlspecialchars($_POST['email']);
    $dt_nasc = htmlspecialchars($_POST['dt_nasc']);
    $status = htmlspecialchars($_POST['status']);
    $pontos_fidelidade = isset($_POST['pontos_fidelidade']) ? (int)$_POST['pontos_fidelidade'] : 0;
    $observacoes = htmlspecialchars($_POST['observacoes'] ?? '');

    // Dados do endereço
    $logradouro = htmlspecialchars($_POST['logradouro']);
    $numero = htmlspecialchars($_POST['numero']);
    $complemento = htmlspecialchars($_POST['complemento'] ?? '');
    $cidade = htmlspecialchars($_POST['cidade']);
    $cep = htmlspecialchars($_POST['cep']);
    $bairro = htmlspecialchars($_POST['bairro']);
    $estado = htmlspecialchars($_POST['estado']);

    //invocar o método de inserir_cliente
    $objController->inserir_cliente(
        $nome,
        $cpf,
        $telefone,
        $email,
        $dt_nasc,
        $status,
        $logradouro,
        $numero,
        $complemento,
        $cidade,
        $cep,
        $bairro,
        $estado,
        $pontos_fidelidade,
        $observacoes
    );
}

//consultar cliente "ATENÇÃO ERRO"
if (isset($_POST['consultar_cliente'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $nome = htmlspecialchars($_POST['nome']);

    //invocar o método de consultar_cliente
    $objController->consultar_cliente($nome);
}

//alterar cliente
if (isset($_POST['alterar_cliente'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $id_cliente = htmlspecialchars($_POST['id_cliente']);
    $nome = htmlspecialchars($_POST['nome']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $email = htmlspecialchars($_POST['email']);
    $observacoes = htmlspecialchars($_POST['observacoes']);

    //invocar o método de alterar_cliente
    $objController->alterar_cliente($id_cliente, $nome, $telefone, $email, $observacoes);
}

//excluir cliente
if (isset($_POST['excluir_cliente'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $id_cliente = htmlspecialchars($_POST['id_cliente']);
    //invocar o método de excluir_cliente
    $objController->excluir_cliente($id_cliente);
}

//========================================= FUNCIONÁRIO ======================================================
// consultar funcionário
if (isset($_POST['consultar_funcionario'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $objController = new Controller();
    $objController->consultar_funcionario($nome);
}

// verificar CPF do funcionário
if (isset($_POST['verificar_cpf_funcionario'])) {
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']); // remove pontos e traços
    $objController = new Controller();
    $objController->verificar_cpf_funcionario($cpf);
}


// inserir funcionário
if (isset($_POST['inserir_funcionario'])) {
    $objController = new Controller();
    $nome = htmlspecialchars($_POST['nome']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $email = htmlspecialchars($_POST['email']);
    $dt_admissao = htmlspecialchars($_POST['dt_admissao']);
    $salario = htmlspecialchars($_POST['salario']);
    $cargo = htmlspecialchars($_POST['cargo']);
    $objController->inserir_funcionario($nome, $cpf, $telefone, $email, $dt_admissao, $salario, $cargo);
}

// alterar funcionário
if (isset($_POST['alterar_funcionario'])) {
    $objController = new Controller();
    $id_funcionario = htmlspecialchars($_POST['id_funcionario']);
    $nome = htmlspecialchars($_POST['nome']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $email = htmlspecialchars($_POST['email']);
    $cargo = htmlspecialchars($_POST['cargo']);
    $objController->alterar_funcionario($id_funcionario, $nome, $telefone, $email, $cargo);
}

// excluir funcionário
if (isset($_POST['excluir_funcionario'])) {
    $objController = new Controller();
    $id_funcionario = htmlspecialchars($_POST['id_funcionario']);
    $objController->excluir_funcionario($id_funcionario);
}


//==========================================  SERVIÇO ========================================================

//inserir servico
if (isset($_POST['inserir_servico'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $preco = htmlspecialchars($_POST['preco']);
    $carga_horaria = htmlspecialchars($_POST['carga_horaria']);
    //invocar o método de inserir_servico
    $objController->inserir_servico($nome, $descricao, $preco, $carga_horaria);
}


//consultar funcionario "ATENÇÃO ERRO"
if (isset($_POST['consultar_servico'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $nome = htmlspecialchars($_POST['nome']);
    //invocar o método de consultar_funcionario
    $objController->consultar_servico($nome);
}

//alterar serviço
if (isset($_POST['alterar_servico'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $id_Servico = htmlspecialchars($_POST['id_Servico']);
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $preco = htmlspecialchars($_POST['preco']);
    $carga_horaria = htmlspecialchars($_POST['carga_horaria']);
    //invocar o método de alterar_funcionario
    $objController->alterar_servico($id_Servico, $nome, $descricao, $preco, $carga_horaria);
}

//excluir funcionario
// excluir servico
if (isset($_POST['excluir_servico'])) {
    $objController = new Controller();
    $id_Servico = htmlspecialchars($_POST['id_servico']); // nome correto do campo
    $objController->excluir_servico($id_Servico);
}
//========================================= AGENDAMENTO ======================================================
// ====== ABRIR PÁGINA (GET) ======
// Ex.: index.php?pagina=agendamentos
if (!empty($_GET['pagina']) && $_GET['pagina'] === 'agendamentos') {
    require_once __DIR__.'/controller/Controller.class.php';
    $ctrl = new Controller();
    // carrega a página com default (ex.: próximos 7 dias)
    $ctrl->abrir_agendamentos();
    exit;
}

// ====== (opcional) Autocomplete, caso use via AJAX ======
// GET index.php?acao=autocomplete_clientes&q=...
if (isset($_GET['acao']) && $_GET['acao'] === 'autocomplete_clientes') {
    require_once __DIR__.'/controller/Controller.class.php';
    $ctrl = new Controller();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($ctrl->autocompleteClientes($_GET['q'] ?? ''), JSON_UNESCAPED_UNICODE);
    exit;
}
if (isset($_GET['acao']) && $_GET['acao'] === 'autocomplete_funcionarios') {
    require_once __DIR__.'/controller/Controller.class.php';
    $ctrl = new Controller();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($ctrl->autocompleteFuncionarios($_GET['q'] ?? ''), JSON_UNESCAPED_UNICODE);
    exit;
}
if (isset($_GET['acao']) && $_GET['acao'] === 'autocomplete_servicos') {
    require_once __DIR__.'/controller/Controller.class.php';
    $ctrl = new Controller();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($ctrl->autocompleteServicos($_GET['q'] ?? ''), JSON_UNESCAPED_UNICODE);
    exit;
}

// GET index.php?acao=horarios_disponiveis&id_funcionario=..&id_servico=..&data=YYYY-MM-DD
if (isset($_GET['acao']) && $_GET['acao'] === 'horarios_disponiveis') {
    require_once __DIR__.'/controller/Controller.class.php';
    header('Content-Type: application/json; charset=utf-8');

    $idFunc = isset($_GET['id_funcionario']) ? (int)$_GET['id_funcionario'] : 0;
    $idServ = isset($_GET['id_servico'])     ? (int)$_GET['id_servico']     : 0;
    $data   = isset($_GET['data'])           ? trim($_GET['data'])          : '';

    try {
        $ctrl = new Controller();
        $out  = $ctrl->horarios_disponiveis($idFunc, $idServ, $data); // devolve ['ok'=>..., 'horarios'=>[...] ]
        echo json_encode($out, JSON_UNESCAPED_UNICODE);
    } catch (Throwable $e) {
        error_log('horarios_disponiveis erro: '.$e->getMessage());
        echo json_encode(['ok'=>false, 'horarios'=>[], 'msg'=>'Falha interna']);
    }
    exit;
}



// inserir agendamento
if (isset($_POST['inserir_agendamento'])) {
    // var_dump($_POST); exit;
    $id_cliente     = (int)($_POST['id_cliente'] ?? 0);
    $id_funcionario = (int)($_POST['id_funcionario'] ?? 0);
    $id_servico     = (int)($_POST['id_servico'] ?? 0);
    $data_iso       = trim($_POST['data_agendamento'] ?? '');
    $hora           = trim($_POST['hora_agendamento'] ?? '');

    $ts = strtotime("$data_iso $hora");
    $data_hora_agendamento = $ts ? date('Y-m-d H:i:s', $ts) : '';

    $ctrl = new Controller();
    $ctrl->inserir_agendamentos($id_cliente, $id_funcionario, $id_servico, $data_hora_agendamento);

    exit; // garante que o router não continue executando
}





//consultar agendamento
// router.php
if (!empty($_POST['consultar_agendamento'])) {
    require_once __DIR__.'/controller/Controller.class.php';
    $ctrl = new Controller();
    // Controller normaliza, consulta e inclui a view
    $ctrl->consultar_agendamentos($_POST);
    exit;
}



//alterar agendamento
if (isset($_POST['alterar_agendamento'])) {
    // Instanciar controller
    $objController = new Controller();

    // Receber os dados do formulário
    $id_agendamento = htmlspecialchars($_POST['id_agendamento']);
    $id_cliente = htmlspecialchars($_POST['id_cliente']);
    $id_funcionario = htmlspecialchars($_POST['id_funcionario']);
    $id_servico = htmlspecialchars($_POST['id_servico']);
    $data_hora_agendamento = htmlspecialchars($_POST['data_hora_agendamento']);

    // Invocar o método alterar_agendamentos
    $objController->alterar_agendamentos(
        $id_agendamento,
        $id_cliente,
        $id_funcionario,
        $id_servico,
        $data_hora_agendamento
    );
}


//excluir agendamento
if (isset($_POST['excluir_agendamento'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $id_agendamento = htmlspecialchars($_POST['id_agendamento']);
    //invocar o método de excluir_agendamento
    $objController->excluir_agendamentos($id_agendamento);
}
//========================================= Relatorios ======================================================
if (isset($_GET['relatorios'])) {
    require_once __DIR__ . '/controller/Controller.class.php';
    $controller = new Controller();
    $controller->exibirRelatorios(); 
    exit;
}

if (isset($_POST['exportar_relatorios_csv'])) {
    require_once __DIR__ . '/controller/Controller.class.php';
    $controller = new Controller();
    $controller->exportarRelatoriosCsv();
    exit;
}
// ========================================= TRANSAÇÕES ======================================================

// Garante que a classe Controller está carregada (segue seu padrão)
if (!class_exists('Controller')) {
    // Usa o autoload (já carregado no index.php). Ainda assim, garante o include correto.
    $ctrlPath = __DIR__ . '/controller/Controller.class.php';
    if (is_readable($ctrlPath)) {
        require_once $ctrlPath;
    }
}

// Confirmar pagamento (POST tradicional, recarrega a página depois)
if (isset($_POST['acao']) && $_POST['acao'] === 'transacoes_confirmar_pagamento') {
    $objController = new Controller();
    $objController->confirmar_pagamento_post(); // processa e redireciona de volta
    exit;
}

// Registrar transação manual (se você usa esse fluxo a partir de um form)
if (isset($_POST['registrar_transacao'])) {
    $objController = new Controller();

    // Normalização no mesmo estilo do restante do arquivo
    $id_cliente     = (int)($_POST['id_cliente'] ?? 0);
    $id_servico     = (int)($_POST['id_servico'] ?? 0);
    $id_agendamento = (int)($_POST['id_agendamento'] ?? 0);

    // aceita "123,45" ou "123.45"
    $valor_final_raw  = (string)($_POST['valor_final'] ?? '0');
    $valor_final_norm = str_replace(',', '.', preg_replace('/[^0-9,\.\-]/', '', $valor_final_raw));

    $forma_pagamento = htmlspecialchars($_POST['forma_pagamento'] ?? '');
    $satisfacao      = (int)($_POST['satisfacao'] ?? 5);

    // mantém a mesma regra que você usa
    $data_conclusao = date('Y-m-d H:i:s');
    $pontos_gerados = (int)floor((float)$valor_final_norm / 10);

    $objController->registrar_transacao(
        $id_cliente,
        $id_servico,
        $id_agendamento,
        $data_conclusao,
        $valor_final_norm,
        $forma_pagamento,
        $satisfacao,
        $pontos_gerados
    );
    exit;
}

// // Rota: ?pagina=transacoes
// if (isset($_GET['pagina']) && $_GET['pagina'] === 'transacoes') {
//     $objController = new Controller();

//     // Executa ações/listagem
//     $vars = $objController->transacoes_index();

//     // Extrai variáveis para a view (rows, total, etc.)
//     extract($vars);
//     include 'view/transacoes.php';

//     include './view/transacoes.php';
//     exit;
// }


// ========================================= TRANSAÇÕES ======================================================
// Garanta que o arquivo da Controller está com o nome certo
if (!class_exists('Controller')) {
    // Se o arquivo chama Controller.class.php, ajuste o nome abaixo:
    require_once __DIR__ . '/controller/Controller.class.php';
    // ou, se de fato o nome do arquivo é Controller.php, mantenha:
    // require_once __DIR__ . '/controller/Controller.php';
}

/* ----------------- TRANSACOES: PENDENTES ----------------- */
if (isset($_GET['pagina']) && $_GET['pagina'] === 'transacoes') {
    $objController = new Controller();
    $objController->transacoes_pendentes_index(); // método existe (vide abaixo)
    exit;
}

// Alias de compatibilidade: ?pagina=transacao -> mesma tela de pendentes
if (isset($_GET['pagina']) && $_GET['pagina'] === 'transacao') {
    $objController = new Controller();
    $objController->transacoes_pendentes_index();
    exit;
}

// Nova rota híbrida (pendentes + agendamentos sem transação)
if (isset($_GET['pagina']) && $_GET['pagina'] === 'transacoes_mix') {
    $objController = new Controller();
    $objController->transacoes_index();
    exit;
}

/* ----------------- TRANSACOES: PAGAS (HISTORICO) ----------------- */
if (isset($_GET['pagina']) && $_GET['pagina'] === 'transacoes_pagas') {
    $objController = new Controller();
    $objController->transacoes_pagas_index();
    exit;
}

/* ----------------- TRANSACOES: CONFIRMAR PAGAMENTO (POST) ----------------- */
if (isset($_POST['acao']) && $_POST['acao'] === 'transacoes_confirmar_pagamento') {
    $objController = new Controller();
    $objController->confirmar_pagamento_post();
    exit;}


//=========================================Promoções=======================================================
//consultar cliente "ATENÇÃO ERRO"
if (isset($_POST['consultar_promocoes'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $nome = htmlspecialchars($_POST['nome']);

    //invocar o método de consultar_cliente
    $objController->consultar_promocoes($nome);
}

//inserir servico
if (isset($_POST['inserir_promocao'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $desconto_percentual = htmlspecialchars($_POST['desconto_percentual']);
    $data_inicio = htmlspecialchars($_POST['data_inicio']);
    $data_fim = htmlspecialchars($_POST['data_fim']);

    //invocar o método de inserir_servico
    $objController->inserir_promocao($nome, $descricao, $desconto_percentual, $data_fim, $data_inicio);
}

//alterar serviço
if (isset($_POST['alterar_promocao'])) {
    $objController = new Controller();

    $id = htmlspecialchars($_POST['id']);
    $nome = htmlspecialchars($_POST['nome']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $desconto_percentual = htmlspecialchars($_POST['desconto_percentual']);
    $data_inicio = htmlspecialchars($_POST['data_inicio']);
    $data_fim = htmlspecialchars($_POST['data_fim']);

    $objController->alterar_promocao($id, $nome, $descricao, $desconto_percentual, $data_inicio, $data_fim);
}


//excluir funcionario
if (isset($_POST['excluir_promocao'])) {
    //instanciar controller
    $objController = new Controller();
    //dados
    $id = htmlspecialchars($_POST['id']);
    //invocar o método de excluir_funcionario
    $objController->excluir_promocao($id);
}


//=========================================== USUÁRIO ========================================================
if (isset($_POST['inserir_usuario'])) {
    // use __DIR__ e pasta com nome exato no servidor (muitos hosts são case‑sensitive)
    require_once __DIR__ . '/controller/Controller.class.php'; // não 'Controller/', e sim 'controller/' se a pasta for minúscula
    $controller = new Controller();
    $controller->cadastrarUsuario(); // ✅ sem parâmetros
    exit; // evita cair no restante da página
}

if (isset($_POST['editar_foto'])) {
    $id = (int)$_POST['id_usuario'];
    $controller = new Controller();
    $controller->atualizarFotoPerfil($id, $_FILES['foto_perfil']);
    exit;
}



//Completar cadastro 
if (isset($_POST['completar_cadastro'])) {
    $dados = [
        'id_usuario' => $_POST['id_usuario'],
        'data_nascimento' => $_POST['data_nascimento'],
        'genero' => $_POST['genero'],
        'telefone' => $_POST['telefone'],
        'notificacoes_email' => isset($_POST['notificacoes_email']) ? 1 : 0,
        'lembretes_agendamento' => isset($_POST['lembretes_agendamento']) ? 1 : 0,
        'foto_perfil' => $_FILES['foto_perfil'] ?? null
    ];

    $endereco = [
        'cep' => $_POST['cep'],
        'rua' => $_POST['rua'],
        'numero' => $_POST['numero'],
        'bairro' => $_POST['bairro'],
        'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado']
    ];

    $controller = new Controller();
    $controller->completar_cadastro($dados, $endereco);
}

// index.php?pagina=chatbot
if (!empty($_GET['pagina']) && $_GET['pagina'] === 'chatbot') {
    require_once __DIR__ . '/controller/Controller.class.php';
    $ctrl = new Controller();
    $ctrl->exibirChatbot();
    exit;
}

// AJAX: NÃO renderize view aqui!
if (isset($_GET['acao']) && $_GET['acao'] === 'carregar_conversa') {
    require_once __DIR__ . '/controller/Controller.class.php';
    (new Controller())->carregarConversa();
    exit;
}
if (isset($_GET['acao']) && $_GET['acao'] === 'enviar_mensagem') {
    require_once __DIR__ . '/controller/Controller.class.php';
    (new Controller())->enviarMensagemChat();
    exit;
}
if (isset($_GET['acao']) && $_GET['acao'] === 'conversas_json') {
    require_once __DIR__ . '/controller/Controller.class.php';
    (new Controller())->conversasJson();
    exit;
}
//==============================chatbot===============================
if (!class_exists('Controller')) {
    require_once __DIR__ . '/controller/Controller.class.php';
}

// Tenta carregar o ChatController (ajuste o caminho se sua pasta diferir)
if (!class_exists('ChatController')) {
    $__chatControllerPath = __DIR__ . '/controller/ChatController.php';
    if (is_file($__chatControllerPath)) {
        require_once $__chatControllerPath;
    } else {
        // Fallback opcional: evita tela branca caso o arquivo não exista
        $tmpCtl = new Controller();
        $tmpCtl->mostrarMensagem('Arquivo ChatController.php não encontrado em /controller.');
        // Opcionalmente redireciona para dashboard
        // header('Location: index.php?pagina=dashboard'); exit;
    }
}

// Helper de sanitização
function _limpa($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

// ---------- NAVEGAÇÃO (GET) ----------
if (isset($_GET['pagina']) && $_GET['pagina'] === 'chatbot') {
    try {
        $ctl = new ChatController();
        // Este método deve:
        // - montar $conversas, $conversa_selecionada, $mensagens, $erro_comunicacao
        // - incluir view/chatbot.php
        $ctl->index();
    } catch (Throwable $e) {
        // Garante uma mensagem amigável no padrão do projeto
        $base = new Controller();
        $base->mostrarMensagem('Falha ao abrir Chatbot: ' . _limpa($e->getMessage()));
        // Opcional: redireciona
        // header('Location: index.php?pagina=dashboard');
    }
    exit; // impede cair em outras rotas
}

// ---------- AÇÕES (POST) ----------
if (isset($_GET['pagina']) && $_GET['pagina'] === 'chatbot_teste') {
    require __DIR__ . '/view/chatbot_teste.php';
    exit;
}

// // Enviar mensagem na conversa atual
// if (isset($_POST['chat_enviar'])) {
//     try {
//         $ctl = new ChatController();
//         $ctl->enviarMensagemPost(); // deve ler id_conversa, texto, anexo
//     } catch (Throwable $e) {
//         $base = new Controller();
//         $base->mostrarMensagem('Erro ao enviar mensagem: ' . _limpa($e->getMessage()));
//         // volta para a conversa, se veio id
//         $id = $_POST['id_conversa'] ?? '';
//         header('Location: index.php?pagina=chatbot' . ($id ? '&id_conversa=' . _limpa($id) : ''));
//     }
//     exit;
// }

// // Iniciar nova conversa
// if (isset($_POST['chat_nova_conversa'])) {
//     try {
//         $ctl = new ChatController();
//         $ctl->novaConversaPost(); // deve ler telefone, nome, mensagem
//     } catch (Throwable $e) {
//         $base = new Controller();
//         $base->mostrarMensagem('Erro ao iniciar conversa: ' . _limpa($e->getMessage()));
//         header('Location: index.php?pagina=chatbot');
//     }
//     exit;
// }

// // Enviar template (HSM) na conversa ativa
// if (isset($_POST['chat_enviar_template'])) {
//     try {
//         $ctl = new ChatController();
//         $ctl->enviarTemplatePost(); // deve ler id_conversa, template, parametros_json
//     } catch (Throwable $e) {
//         $base = new Controller();
//         $base->mostrarMensagem('Erro ao enviar template: ' . _limpa($e->getMessage()));
//         $id = $_POST['id_conversa'] ?? '';
//         header('Location: index.php?pagina=chatbot' . ($id ? '&id_conversa=' . _limpa($id) : ''));
//     }
//     exit;
// }

// // Encerrar conversa
// if (isset($_POST['chat_encerrar'])) {
//     try {
//         $ctl = new ChatController();
//         $ctl->encerrarConversaPost(); // deve ler id_conversa
//     } catch (Throwable $e) {
//         $base = new Controller();
//         $base->mostrarMensagem('Erro ao encerrar conversa: ' . _limpa($e->getMessage()));
//     }
//     header('Location: index.php?pagina=chatbot');
//     exit;
// }

//=========================================================================


// Detecta corretamente a URL index.php?perfil
if (isset($_GET['pagina']) && $_GET['pagina'] === 'perfil') {
    require_once 'controller/Controller.class.php';
    $controller = new Controller();
    $controller->exibirPerfil(); // ou carregarPerfil($_SESSION['id_usuario']);
}


if (isset($_POST['editar_perfil'])) {
    // Instancia o controller
    $objController = new Controller();

    // Sanitiza os dados de entrada (protege contra XSS)
    $dados = array_map('htmlspecialchars', $_POST);

    // Chama o método passando todos os dados de forma segura
    $objController->editar_perfil($dados);
}

if (isset($_GET['pagina']) && $_GET['pagina'] === 'dashboard') {
    require_once 'controller/Controller.class.php';

    $controller = new Controller();
    $controller->exibirDashboard();
}

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];

    if ($pagina === 'perfil') {
        $controller = new Controller();
        $controller->exibirPerfil();
    } else {
        $controller = new Controller();
        $controller->mostrarView($pagina);
    }




}
?>



