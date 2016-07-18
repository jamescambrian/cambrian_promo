<!-- FORM DETAILS -->
<?php 
if(isset($_POST['submit'])){
    $to = "james.cambrian@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Reaction CAM000";
    $subject2 = "Your Reaction to CAM000";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
    echo '<span class="message">Thank you for your reaction</span>';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CAMBRIAN LINE - PROMO</title>
    <link href="css/main.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,700|Lato:400,300,700|Open+Sans:800" rel="stylesheet" type="text/css">

  </head>
  <body>

    <div class="main-cover enter1">
        <a target="_blank" href="http://cambrianline.org"><img class="logo" src="images/logo.png"/></a>

<div class="container">
    <section class="one-third column enter2">
       <?php  include 'content/player.php'; ?>

  </section>
  <section class="one-third column enter2">
        <?php  include 'description.php'; ?>
  </section>

  <section class="one-third column enter2">
     <?php  include 'form.php'; ?>
</section>
</div>
    </div>
<?php include 'footer.php'; ?>
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/player--playlist.js"></script>

  </body>

</html>
