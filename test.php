<?php
$con= mysqli_connect('localhost','root','','mytasks');
$response = array();
if($con){
    $sql = "SELECT * FROM tasks";
    $result = mysqli_query($con,$sql);
    header('Content-type:JSON');
    if($result){
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $response[$i]['id']= $row['id'];
            $response[$i]['name']= $row['name'];
            $response[$i]['date']= $row['date'];
            $response[$i]['complete']= $row['complete'];
            $i++; 
        }
        // echo json_encode($response,JSON_PRETTY_PRINT);
        $jsonobj = json_encode($response,JSON_PRETTY_PRINT);
    }
}
else{
    print("DB Connection Error");
}
?>