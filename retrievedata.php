<?php
$data= '{"timeSeriesBySclIds":{"filter":{"maxSize":"1500","createdAfter":"1549391400000" ,"createdBefore":"1549477799000"},"series":[{"sclId":"0351608081166105"}]}}';
$url = "https://api-aercloud-preprod.aeriscloud.com/v1/201470/containers/fleetStream/contentInstances/search?apiKey=fc85cd1c-1bdd-4162-bb91-4b1cc2be79a0";
$curl= curl_init($url);
curl_setopt($curl,CURLOPT_HEADER, FALSE);
curl_setopt($curl,CURLOPT_HTTPHEADER,array(
        'content-Type:application/json',
        //$urlvalue.'&ans=10',
      

));
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($curl,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
	
	
	$result = curl_exec($curl);
    if(!$result){
        die("Connection Failure");
    }
    error_reporting(0);
    $result =json_decode($result, true); 
    echo "<table>";
                    echo "
                    <tr>
                    <th>mobile id type</th>
                    <th>mobile id</th>
                    <th>speed</th>
                    <th>update time</th>
                    </tr> ";
                    echo'<tbody>';
     foreach($result as $key1=>$a )
     {
         foreach($a as $key2=>$b)
         {
             foreach($b as $key3=>$c)
             {
                 foreach($c as $key4=>$d)
                 {
                     foreach($d as $key5=>$e)
                     //   print_r($e);
                        $de = json_decode($e, true);
                       // print_r($d);
                        echo'<tr>
                        <td>'.$de['mobileIdType'].'</td>
                        <td>'.$de['mobileId'].'</td>
                        <td>'.$de['speed'].'</td>
                        <td>'.$de['updateTime'].'</td>
                        </tr>';
                    }
                }
             }
            }
             echo '</tbody>';
            echo '</table>';   
    
        
         //print_r($result)
         curl_close($curl);
  
    
?>