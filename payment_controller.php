<?php
    $pendingData=file_get_contents('pending.json');
    $data=json_decode($pendingData,true);
    if(isset($_POST['submit'])){
        $id=random_int(00000,99999);
        $from=$_POST['from'];
        $to=$_POST['to'];
        $amount=$_POST['amount'];
        $signature=$_POST['signature'];

        if(is_numeric($amount)){
            if($amount>0 && $amount<=1000){}
            else {
                echo "Error! Minimum is 0 BDT and maximum is 1000 BDT.";
                return;
            }
        }else{
            echo "Error! Amount needs to be a number.";
            return;
        }
    

        $details=array(
        "ID"=>$id,
        "FROM"=>$from,
        "TO"=>$to,
        "DATE"=>date("d-m-y"),
        "AMOUNT"=>$amount,
        "SIGNATURE"=>$signature,
        "VOTE"=>0
    );

        $data[]=$details;
        $json=json_encode($data,JSON_PRETTY_PRINT);
        if(file_put_contents('pending.json',$json)){
            echo "Payment successful.Wait for approval";
        }else{
            echo "Error!Payment failed";
        }
    }
?>