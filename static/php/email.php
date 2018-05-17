<?php
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
  }

  $sendto   = "radius486@gmail.com";
  $customername = $_POST['name'];
  $customerphone = $_POST['phone'];
  $sendfrom = "inovatech";

  $product = $_POST['product'];
  $color = $_POST['color'];
  $quantity = $_POST['quantity'];
  $comment = $_POST['comment'];

  $subject  = "Новый заказ: ";
  $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

  $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
  $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Сообщение с сайта</h2>\r\n";

  if ($customername) { $msg .= "<p><strong>Имя:</strong> ".$customername."</p>\r\n"; }

  $msg .= "<p><strong>Телефон:</strong> ".$customerphone."</p>\r\n";
  $msg .= "<p><strong>Название товара:</strong> ".$product."</p>\r\n";

  if ($color) { $msg .= "<p><strong>Цвет:</strong> ".$color."</p>\r\n"; }

  if ($quantity) { $msg .= "<p><strong>Количество:</strong> ".$quantity."</p>\r\n";}

  if ($comment) { $msg .= "<p><strong>Комментарий:</strong> ".$comment."</p>\r\n"; }

  $msg .= "</body></html>";

  if(@mail($sendto, $subject, $msg, $headers)) {
    echo "success";
  } else {
    echo "error";
  }

?>
