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
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Thank you for your reaction ";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
<!-- Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit"> -->

<label>Name</label><br>  
    <input name="name">
    <br>       
    <label>Email</label><br>  
    <input name="email" type="email">
    <br>       
    <label>Reaction</label><br>  
    <textarea name="message"></textarea>
    <br>         
    <input class="button__submit" id="submit" name="submit" type="submit" value="Submit">

</form>



</body>
</html> 