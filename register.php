<?php

    //get data from request 
    $data = json_decode(file_get_contents("php://input"));
    
    if($data->email!=""){
        //Connect ot Mysql Database Server
        $con = mysqli_connect("localhost","root","","8_30_batch");
        
        //Prepare Query to Insert record
        $str = "insert into users(name,email,password)values
        ('$data->name','$data->email','$data->password')";

        //Execute Query and store response in result 
        $result = mysqli_query($con,$str) or die(json_encode(["text"=>
        "Registration Failed","error"=>mysqli_error($con),"class"=>"danger"])); // Print error while insert record in DB
        
        //Print Successful response
        echo json_encode(["text"=>
        "Registration Successful","error"=>false,"class"=>"success"]);
    }else{
    
        //Print Error if data is not in request
        echo json_encode(["text"=>
        "Registration Failed","error"=>"Empty Request","class"=>"danger"]))
    }
?>