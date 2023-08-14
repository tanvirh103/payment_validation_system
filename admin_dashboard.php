<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="payment-list">
    <div class="section-title">Pending Payments</div>
   
    <table class="payment-table">
      <thead>
        <tr>
          <th>From</th>
          <th>To</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Approval Votes</th>
          <th>Action</th>
        </tr>
      </thead>
        <?php
         $usuerID = $_COOKIE['admin'];

         $pendingData = file_get_contents('pending.json');
         $arrayData = json_decode($pendingData, true);
         
         if($usuerID == 2) {
            $currentData2 = file_get_contents('JSON/Admin/list-admin-1.json');
        }else if($usuerID == 3) {
            $currentData2 = file_get_contents('JSON/Admin1/list-admin-2.json');
        }else if($usuerID == 4){
            $currentData2 = file_get_contents('JSON/Admin2/list-admin-3.json');
        } 
         $adminarray = json_decode($currentData2, true);

         if($arrayData == null) {

             ?> <tr><td colspan="6">No Transactions At This Moment</td></tr><?php

         }
         else {
            foreach($arrayData as $col){
                $flag = false;
                if($adminarray == null) {}
                else{
                foreach($adminarray as $col1){
                    if($adminarray == null) {}
                    else{
                    if($col["ID"]==$col1["ID"]) $flag = true;
                    }
                }
                }
                if($flag == true) continue;
                else{
                    ?>
                    <tr>
                        <td> <?php echo $col["FROM"]; ?> </td>
                        <td> <?php echo $col["TO"]; ?> </td>
                        <td> <?php echo $col["AMOUNT"]; ?> </td>
                        <td> <?php echo $col["DATE"]; ?> </td>
                        <td> <?php echo $col["VOTE"]; ?> </td>
                        <td> <a href="approve_controller.php?id=<?php echo $col["ID"]; ?>"><button class="action-button">Approve</button></a></td>
                    </tr>
                <?php
                }
            }
            };
            ?>
        
    </table>
    
    <div class="section-title">Approved Payments</div>
    <table class="payment-table">
      <thead>
        <tr>
          <th>From</th>
          <th>To</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Approval Votes</th>
        </tr>
      </thead>
        <?php
        $usuerID = $_COOKIE['admin'];
        if($usuerID == 2) {
            $pendingData = file_get_contents('JSON/Admin/list-admin-1.json');
        }else if($usuerID == 3) {
            $pendingData = file_get_contents('JSON/Admin1/list-admin-2.json');
        }else if($usuerID == 4){
            $pendingData = file_get_contents('JSON/Admin2/list-admin-3.json');
        } 
         $adminarray = json_decode($pendingData, true);
         if($adminarray == null) {

            ?> <tr><td colspan="6">No Transactions At This Moment</td></tr><?php

        }else{
            foreach($arrayData as $col){
            ?>
            <tr>
                <td> <?php echo $col["FROM"]; ?> </td>
                <td> <?php echo $col["TO"]; ?> </td>
                <td> <?php echo $col["AMOUNT"]; ?> </td>
                <td> <?php echo $col["DATE"]; ?> </td>
                <td> <?php echo $col["VOTE"]; ?> </td>
            </tr>
        <?php
        }
        }

        ?>
    </table>
    </div>
</body>
</html>