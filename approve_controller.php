<?php

    $userid = $_COOKIE['admin'];
    $id = $_GET['id'];
    $pendingData = file_get_contents('pending.json');
    $arrayData = json_decode($pendingData, true);
    foreach ($arrayData as $key => $entry) {
        if ($entry['ID'] == $id) {

            $arrayData[$key]['Approval Votes']++;

            $jsonData = json_encode($arrayData, JSON_PRETTY_PRINT);

            if($arrayData[$key]['Approval Votes']<2){

            if($userid == 2){
                $adminData = file_get_contents('JSON/Admin/list-admin-1.json');
            }else if($userid == 3){
                $adminData = file_get_contents('JSON/Admin1/list-admin-2.json');
            } 
            else if($userid == 4){
                $adminData = file_get_contents('JSON/Admin2/list-admin-3.json');
            } 
                
            $adminarray = json_decode($adminData, true);

            $data2 = array(

                'ID' => $id,
                'To' => $arrayData[$key]['TO'],
                'From' => $arrayData[$key]['FROM'],
                'Date' => $arrayData[$key]['DATE'],
                'Amount' => $arrayData[$key]['AMOUNT'],
                'Signature' => $arrayData[$key]['SIGNATURE'],
                'Approval Votes' => $arrayData[$key]['VOTE']
            
            );

            $arrayData2 [] = $data2;
            $jsonData2 = json_encode($arrayData2, JSON_PRETTY_PRINT);

            if($uid == 2) file_put_contents('JSON/Admin/list-admin-1.json', $jsonData2);
            else if($uid == 3) file_put_contents('JSON/Admin1/list-admin-2.json', $jsonData2);
            else if($uid == 4) file_put_contents('JSON/Admin2/list-admin-3.json', $jsonData2);

            if(file_put_contents('JSON/pending-transaction-log.json', $jsonData)) header('location: admin_dashboard.php');
        }
        else{

            $flag2 = false;
            $flag3 = false;
            $flag4 = false;

            $currentData2 = file_get_contents('JSON/Admin/list-admin-1.json');
            $currentData3 = file_get_contents('JSON/Admin1/list-admin-2.json');
            $currentData4 = file_get_contents('JSON/Admin2/list-admin-3.json');
                
            $arrayData2 = json_decode($currentData2, true);
            $arrayData3 = json_decode($currentData3, true);
            $arrayData4 = json_decode($currentData4, true);

            $data2 = array(

                'ID' => $id,
                'To' => $arrayData[$key]['TO'],
                'From' => $arrayData[$key]['FROM'],
                'Date' => $arrayData[$key]['DATE'],
                'Amount' => $arrayData[$key]['AMOUNT'],
                'Signature' => $arrayData[$key]['SIGNATURE'],
                'Approval Votes' => $arrayData[$key]['VOTE']
            
            );

            foreach($arrayData2 as $row2){

                if ($row2["ID"] == $id) $flag2 = true;

            }
            foreach($arrayData3 as $row3){

                if ($row3["ID"] == $id) $flag3 = true;

            }
            foreach($arrayData4 as $row4){

                if ($row4["ID"] == $id) $flag4 = true;

            }


            if ($flag2 == false) $arrayData2 [] = $data2;
            if ($flag3 == false) $arrayData3 [] = $data2;
            if ($flag4 == false) $arrayData4 [] = $data2;
            

            $jsonData2 = json_encode($arrayData2, JSON_PRETTY_PRINT);
            $jsonData3 = json_encode($arrayData3, JSON_PRETTY_PRINT);
            $jsonData4 = json_encode($arrayData4, JSON_PRETTY_PRINT);

            file_put_contents('JSON/Admin/list-admin-1.json', $jsonData2);
            file_put_contents('JSON/Admin1/list-admin-2.json', $jsonData3);
            file_put_contents('JSON/Admin2/list-admin-3.json', $jsonData4);

            unset($arrayData[$key]);
            $arrayData = array_values($arrayData);
            $jsonData = json_encode($arrayData, JSON_PRETTY_PRINT);

            if(file_put_contents('pending.json', $jsonData)) header('location: admin_dashboard.php');

        }
    }
    }

?>