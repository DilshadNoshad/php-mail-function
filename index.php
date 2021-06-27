<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';

} else {
    // Get input values.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $err_msg = '';
    $complete_msg = '';

    // Empty check.
    if ($name == '' || $email == '' || $subject == '' || $message == '') {
        $err_msg = 'Please fill in all fields.';
    }

    if ($err_msg == '') {
        // Send email.
        $to = 'www.dilshadnoshad2007@gmail.com'; // Set your email!!
        $headers = 'From: ' . $email . '\r\n';

        mail($to, $subject, $message, $headers);

        $complete_msg = 'Your message was sent successfully!';

        // Clear all fields.
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Contact me</title>
    <link rel="stylesheet" href="Contactstyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" type="image/x-icon" href="1623427654.ico">
   </head>
<body>
  <div id="preloader"></div>
  <div class="container">
  <?php if ($err_msg != ''): ?>
        <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Alert!</strong> <?php echo $err_msg; ?>
</div>
            <?php endif; ?>

            <?php if ($complete_msg != ''): ?>
              
              <div class="alert success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Success!</strong> <?php echo $complete_msg; ?>
</div>
                    
               
            <?php endif; ?>
    <div class="content">
      <div class="image-box">
        <img src="Email.webp" alt="">
      </div>
    <form method="POST">
      <div class="topic">Send me a message</div>
      <div class="input-box">
        <input type="text" name="name" value="<?php echo $name; ?>" required>
        <label>Enter your name</label>
      </div>
      <div class="input-box">
        <input type="text" name="email" value="<?php echo $email; ?>" required>
        <label>Enter your email</label>
      </div>
      <div class="input-box">
        <input type="text" name="subject" value="<?php echo $subject; ?>" required>
        <label>Subject</label>
      </div>
      <div class="message-box">
        <textarea name="message"><?php echo $message; ?></textarea>
        <label>Enter your message</label>
      </div>
      <div class="input-box">
        <input type="submit" name="subject" value="Send Message" style="border-color: #0E0E0E;">
      </div>
    </form>
  </div>
  </div>
  <script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
      loader.style.display = "none";
    })
  </script>
</body>
</html>
