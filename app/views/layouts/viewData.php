<?php
    header('Content-Type: application/json');
    $str_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/models/database.json', true);
    // echo $str_data;
    // $temp ='';
    // echo '<pre>'; print_r($str_data)  ;
    $data = json_decode($str_data, true);
    
    for($i = 0; $i < sizeof($data["data"]); $i++)
    {
        // $temp .="<tr  style=\"border: 1px solid #000;\">";
        
        // $temp .= "<td>" . $data["data"][$i]["temparetute"] . "</td>";
        // $temp .= "<td>" . $data["data"][$i]["pH"] . "</td>";
        // $temp .= "<td>" . $data["data"][$i]["Oxyzen"] . "</td>";
        // $temp .= "<td>" . $data["data"][$i]["NH3"] . "</td>";
        // // $temp .= '<td>hello</td>';
        // $temp .= "<tr>";
        echo json_encode($data["data"][$i]);
    }
    // $cout = count($data["data"]);
    
?>

