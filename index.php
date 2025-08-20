<?php
// Páginas disponíveis
$pages = ["lead1.html", "lead2.html"];
$counterFile = __DIR__ . "/ab_counter.txt";

// Se o arquivo não existir, cria com valor 0
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, "0");
}

// Lê o número atual
$counter = (int) file_get_contents($counterFile);

// Calcula o índice da próxima página
$nextIndex = $counter % count($pages);

// Atualiza o contador para o próximo acesso
file_put_contents($counterFile, $counter + 1);

// Mantém os parâmetros da URL
$queryString = $_SERVER['QUERY_STRING'];
$redirectUrl = $pages[$nextIndex] . ($queryString ? "?" . $queryString : "");

// Redireciona imediatamente
header("Location: $redirectUrl");
exit;
