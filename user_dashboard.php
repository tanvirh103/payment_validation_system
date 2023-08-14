<?php

    if(file_exists('login.php')) unlink('login.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="transaction-form">
      <div class="form-section">
        <h2>Payment Form</h2>
        <form action="payment_controller.php" method="post">
          <div class="form-group">
            <label class="form-label">From:</label>
            <input type="text" class="form-input" id="from" name="from" required>
          </div>
          <div class="form-group">
            <label class="form-label">To:</label>
            <input type="text" class="form-input" id="to" name="to" required>
          </div>
          <div class="form-group">
            <label class="form-label">Date:</label>
            <input type="text" class="form-input" id="date" required>
          </div>
          <div class="form-group">
            <label class="form-label" >Amount:</label>
            <input type="number" class="form-input" id="amount" name="amount" required>
          </div>
          <div class="form-group">
            <label class="form-label">Signature:</label>
            <input class="form-input" id="signature" name="signature" required>
          </div>
          <input type="submit" name="submit" value="Make Payment" class="submit-button">
          
        </form>
      </div>
      <div class="form-group"><a href="logout.php"><button class="logout-button">Logout</button></a></div>
    </div>
    
    
  </body>
  </html>
  