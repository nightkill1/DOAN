<?php

namespace app\controllers;

use app\core\Controller;
use \App;

class EditJsonController extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $tempareture_high_ip = $_POST["tempareture_high"];
        $tempareture_low_ip = $_POST["tempareture_low"];
        $ph_high_ip = $_POST["ph_high"];
        $ph_low_ip = $_POST["ph_low"];
        $oxyzen_high_ip = $_POST["oxyzen_high"];
        $oxyzen_low_ip = $_POST["oxyzen_low"];
        $nh3_high_ip = $_POST["nh3_high"];
        $nh3_low_ip = $_POST["nh3_low"];
        
        $input_data=array( 1, $tempareture_high_ip, $tempareture_low_ip, $ph_high_ip, $ph_low_ip, $oxyzen_high_ip, $oxyzen_low_ip, $nh3_high_ip, $nh3_low_ip);


        //Load the file
        $contents = file_get_contents(__DIR__.'../../models/nguongantoan.json');

        //Decode the JSON data into a PHP array.
        $data = json_decode($contents, true);
        // echo "<pre>";
        // print_r($data[0]["thietlap"]);
        foreach($data as $key => $d){
            if($d["id"] === 1){
                unset ($data[$key]);
                
                $save = json_encode(array_values($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                file_put_contents(__DIR__.'../../models/nguongantoan.json', $save);
                break;
            }
           
        }
        // array_push($data[0], array("id" => 1, "thietlap" => array_push($data[0] ,array("tempareture_high" => "2")) ));
        $o_id = (object) array("id" => 1, "thietlap" => (object) array("tempareture_high" => (int)$tempareture_high_ip,"tempareture_low" => (int)$tempareture_low_ip, "ph_high"=> (int)$ph_high_ip, "ph_low" => (int)$ph_low_ip, "oxyzen_high"=> (int)$oxyzen_high_ip, "oxyzen_low" => (int)$oxyzen_low_ip, "nh3_high" => (int)$nh3_high_ip, "nh3_low" => (int)$nh3_low_ip ));


        array_push($data[0]["id"], $o_id );
        
        array_push($data[0]["thietlap"], 2 );
        $strNew = json_encode([$o_id]);
        file_put_contents(__DIR__.'../../models/nguongantoan.json', $strNew);
        
        $data_rq["temp"] = 2; 
        echo json_encode($data_rq);
        
       
    }
}
?>