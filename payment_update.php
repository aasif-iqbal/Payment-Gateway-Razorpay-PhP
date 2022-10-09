<?php
require_once('connection.php');

if(isset($_POST['payment_id']) && isset($_POST['amt']) && isset($_POST['name']))
    {
        // echo("payment info set");
        $payment_id = $_POST['payment_id'];
        $amt = $_POST['amt'];
        $name = $_POST['name'];
        $payment_status = "Completed";
        $payment_time = date('Y-m-d h:i:s');
        
        $sql = "INSERT into payment_info (name,amount,payment_status,payment_id,payment_time) 
                VALUES('$name','$amt','$payment_status','$payment_id','$payment_time')";
        
        var_dump($sql);
        
        // Check connection
        if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
        }
        
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
        
    }else{
        echo("payment info not set");die();            
    }


