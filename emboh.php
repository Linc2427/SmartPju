<?php
    include 'koneksi.php';
    $sensor = mysqli_query($conn,"SELECT * FROM data");  
    // $result = mysqli_query ($conn,"INSERT INTO data  VALUES ('".$_GET["data"]."')");
    // require_once('./Antares.php');
    // $row=mysqli_fetch_array($sensor);
?>
<?php
            require_once('./Antares.php');

            Antares::init([
                "PLATFORM_URL" => 'https://platform.antares.id:8443', // TODO: Change this to your platform URL
                "ACCESS_KEY" => '44939cc9394902a2:754e96573bd4c6a9' // TODO: Change this to your access key
            ]);
            try {
                $resp = Antares::getInstance()->get('/antares-cse/antares-id/Test_V2/LoRa_V2'); // TODO: Change this to your container uri
                $first10 = $resp->listContentInstanceUris(5);
                foreach ($first10 as $uri) {
                    $payload = Antares::getInstance()->get($uri);
                    $date=strtotime($payload->getCreationTime());
                    $resuri=$payload->con;
                    //$data=$resuri->data;
                    $resuri=json_decode($resuri);
                    //print_r($resuri->data->S);
                    $datenow= date('Y-m-d h:i:s', $date);
                    $V  = $resuri->data->V;
                    echo "Tegangan: $V";
                    echo "<br>";
                    $I  = $resuri->data->I;
                    echo "Arus: $I";
                    echo "<br>";
                    $P  = $resuri->data->P;
                    echo "Daya: $P";
                    echo "<br>";
                    $L  = $resuri->data->L; 
                    echo "Intensitas Cahaya: $L";
                    echo "<br>";
                    $S  = $resuri->data->S;
                    echo "Status: $S";
                    echo "<br>";
                    $T  = $resuri->data->T;
                    echo "Suhu: $T";
                    echo "<br>";
                    echo "Waktu: $datenow";
                    echo "<br>";
                    echo "<br>";
                }
            } catch (Exception $e) {
                echo($e->getMessage());
            }
                            
?>