<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST['Mesage']);

    // Validação básica
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    // Configuração do e-mail
    $to = "seuemail@example.com"; // Seu e-mail
    $subject = "Mensagem do formulário de contato";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Corpo do e-mail
    $body = "Você recebeu uma nova mensagem:\n\n";
    $body .= "Nome: $nome\n";
    $body .= "E-mail: $email\n";
    $body .= "Mensagem:\n$mensagem\n";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
