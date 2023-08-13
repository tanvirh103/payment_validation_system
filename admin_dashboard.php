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
        <tr><td>Transaction ID</td>
            <td>From &nbsp;&nbsp;</td>
            <td>To &nbsp;&nbsp;</td>
            <td>Amount &nbsp;&nbsp;</td>
            <td>Date&nbsp;&nbsp;</td>
            <td>Approval Votes&nbsp;&nbsp;</td>
            <td>Action&nbsp;&nbsp;</td>
        </tr>
    </table>
    <table id="pending_table" cellspacing="25" align="right">
        <tr><td colspan="6">Approved Payment</td></tr>
        <tr><td>Transaction ID</td>
            <td>From&nbsp;&nbsp;</td>
            <td>To&nbsp;&nbsp;</td>
            <td>Amount&nbsp;&nbsp;</td>
            <td>Date&nbsp;&nbsp;</td>
            <td>Approval Votes&nbsp;&nbsp;</td>
            <td>Action&nbsp;&nbsp;</td>
        </tr>
    </table>
</body>
</html>