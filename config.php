<?php
// config.php

// --- Fuso horário (evita datas estranhas em logs) ---
date_default_timezone_set('America/Recife'); // ajuste se quiser

// --- BASE_URL robusto (suporta proxy/Cloudflare) ---
define('BASE_URL', (function () {
    $https = (
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
    );
    $scheme = $https ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $base   = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? '/'), '/\\');
    return rtrim("$scheme://$host$base", '/');
})());

// ----------------------
// Config WhatsApp / Meta
// ----------------------
// ⚠️ IMPORTANTE: Troque estes valores por variáveis de ambiente em produção.
// Se este arquivo vazou com tokens reais, **ROTEIE** (regenere) o token no painel da Meta.

// IDs
define('WHATSAPP_PHONE_ID', '781477601707573');
define('WHATSAPP_WABA_ID',  '1856239031624273');

// Tokens/segurança
define('WHATSAPP_TOKEN',        'EAASEe6v4HoQBPZAB4bbZCHIPOBYk9YxorC4dGJd7uCDp8zhSbmNI2Fb7xgojetKPziVOlLCY0ZACSOstHjIxbkDTTN6WWhiYk1AadBKfciTAjY2eOnqLuxqgERwnIX7txmVQ7iKBfCZAYldSFKLz5qXW4KxNcSm0qndaPXeCuUtWZBJVRBvcVzXjoDz8g3oODUgZDZD');   // Access Token
define('WHATSAPP_VERIFY_TOKEN', 'thijess_verify_2025');              // Verify token do webhook
define('META_APP_SECRET',       'xxxxxxxxxxxxxxxx');                 // App Secret (p/ assinatura)

// Versão Graph (opcional, ajuda a padronizar endpoints)
define('META_GRAPH_VERSION', 'v20.0');

// ----------------------
// Bridge p/ o webhook
// ----------------------
// O webhook usa getenv('META_ACCESS_TOKEN'), getenv('META_VERIFY_TOKEN'), getenv('META_APP_SECRET').
// Vamos espelhar as **constantes** em **variáveis de ambiente** para manter compatibilidade.
putenv('META_ACCESS_TOKEN=' . WHATSAPP_TOKEN);
putenv('META_VERIFY_TOKEN=' . WHATSAPP_VERIFY_TOKEN);
putenv('META_APP_SECRET='   . META_APP_SECRET);

// (opcional) se você quiser acessar a versão em outros pontos:
putenv('META_GRAPH_VERSION=' . META_GRAPH_VERSION);

// ----------------------
// Debug opcional
// ----------------------
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Sanidade (gera um aviso no log do PHP se esquecer de preencher)
if (!WHATSAPP_TOKEN || WHATSAPP_TOKEN === 'EAASEe6v4HoQBPZAB4bbZCHIPOBYk9YxorC4dGJd7uCDp8zhSbmNI2Fb7xgojetKPziVOlLCY0ZACSOstHjIxbkDTTN6WWhiYk1AadBKfciTAjY2eOnqLuxqgERwnIX7txmVQ7iKBfCZAYldSFKLz5qXW4KxNcSm0qndaPXeCuUtWZBJVRBvcVzXjoDz8g3oODUgZDZD') {
    error_log('[config.php] WHATSAPP_TOKEN vazio ou placeholder – preencha/roteie seu token.');
}
