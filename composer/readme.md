# Envio de E-mails com PHP Mailer

### Instalação PHP Mailer

```php
composer require phpmailer/phpmailer
```

### Criar Instância
```php
$mail = new \PHPMailer();
```

### Configurações do Servidor
```php
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'mailcurso702@gmail.com';
$mail->Password = '';
```

### Configuração de Alvos de E-mail
```php
$mail->setFrom('mailcurso702@gmail.com', 'Meu Nome');
$mail->addReplyTo('replyto@meusite.com', 'Meu Nome');
$mail->addAddress('samuel-vicente-moraes@outlook.com', 'Moraes');
$mail->addCC('samuel-vicente-moraes@outlook.com', 'Moraes');
$mail->addBCC('samuel-vicente-moraes@outlook.com', 'Moraes');
$mail->Subject = 'Envio de email';
```

### Mensagens com HTML e Anexos
```php
$mail->Charset = 'UTF-8';
$mail->msgHTML("< p >Mensagem de < b >boas-vindas< /b >!< /p >");
$mail->AltBody = 'Mensagem de boas-vindas');
$mail->addAttachment(_DIR_ .'/logo-devmedia.png');
```

### Teste de Envio
```php
if (!$mail -> send()){
die ("Erro no envio do e-mail: {$mail -> ErrorInfo}");
}echo 'Mensagem enviada com sucesso';
```