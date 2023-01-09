<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['model'])) {$model = $_POST['model'];}
    if (isset($_POST['comment'])) {$comment = $_POST['comment'];}
    // if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
 
    $to = "4smartservice@gmail.com"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "4smartservice@gmail.com"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData
    <br><br>
 <b>Ім'я:</b><br> $name <br><br>
<b>Номер телефону:</b><br> $phone <br><br>
<b>Модель телефону:</b><br> $model <br><br>
<b>Коментар:</b><br> $comment <br><br> ";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
        readfile('done.html');
    }
    else
    {
    echo '
 
<b>Спробуй ще раз</b>
 
';
    }
} else {
    http_response_code(403);
    echo "Спробуй ще раз";
}?>