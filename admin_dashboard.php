<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <center>
        <h2>Admin Dashboard</h2>
    </center>
    <table align="right">
        <td><td><a href="logout.php"><button id="logout">Logout</button></a></td></td>
    </table>
   
    <table id="pending_table" cellspacing="25" align="left">
        <tr><td colspan="6">Pending Payment</td></tr>
        <tr>
            <td>From &nbsp;&nbsp;</td>
            <td>To &nbsp;&nbsp;</td>
            <td>Amount &nbsp;&nbsp;</td>
            <td>Date&nbsp;&nbsp;</td>
            <td>Approval Votes&nbsp;&nbsp;</td>
            <td>Action&nbsp;&nbsp;</td>
        </tr>
        <tr></tr>
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
                        <td> <a href="approve_controller.php?id=<?php echo $col["ID"]; ?>"><button class="btn">Approve</button></a></td>
                    </tr>
                <?php
                }
            }
            };
            ?>
        
    </table>
    <table id="pending_table" cellspacing="25" align="right">
        <tr><td colspan="6">Approved Payment</td></tr>
        <tr>
            <td>From&nbsp;&nbsp;</td>
            <td>To&nbsp;&nbsp;</td>
            <td>Amount&nbsp;&nbsp;</td>
            <td>Date&nbsp;&nbsp;</td>
            <td>Approval Votes&nbsp;&nbsp;</td>
        </tr>
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
</body>
</html>