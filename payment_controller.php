<?php
    $pendingData=file_get_contents('pending.json');
    $data=json_decode($pendingData,true);
    if(isset($_POST['submit'])){
        $id=random_int(00000,99999);
        $from=$_POST['from'];
        $to=$_POST['to'];
        $amount=$_POST['amount'];
        $signature=$_POST['signature'];

        $details=array("ID"=>$id,"FROM"=>$from,"TO"=>$to,"DATE"=>date("d-m-y"),"AMOUNT"=>$amount,"SIGNATURE"=>$signature,"VOTE"=>0);

        $data[]=$details;
        $json=json_encode($data);
        if(file_put_contents('pending.json',$json)){
            echo "Payment successful.Wait for approval";
        }else{
            echo "Error!Payment failed";
        }
    }
?>