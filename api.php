<?php
    $errorMessage = '';
    $meteoImg = '';
    $meteoText = '';
    if ( isset($_GET['city']) )  
    {
        if ( is_numeric($_GET['city']) ) 
        {
            $errorMessage = 'errore: hai digitato un valore numerico';   
        }
        else
        {
            if ($_GET['city'])
            {
                $città = ucfirst($_GET['city']); // rende maiusolo il primo carattere
$url = "http://api.openweathermap.org/data/2.5/forecast?q=".urlencode($_GET['city']).",it&units=metric&appid=120e1e6001e35f4d2b0196a98c1381ac&lang=it";
 /*               
//$ch = curl_init($url); // Create a cURL handle
//curl_exec($ch); // Execute
//
//if (!curl_errno($ch)) { // Check HTTP status code
//  switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
//    case 200:  break; # OK
//    default: $errorEmpty = 'errore'; die('die');
//    //echo 'Unexpected HTTP code: ', $http_code, "\n";
//  }
//}
//curl_close($ch); // Close handle
*/
                $urlContents = @file_get_contents($url);                                                           
                $weather = json_decode($urlContents, true);

                if ( $weather['cod'] == 200)
                {
//                    switch ($weather['list']['0']['weather']['0']['main'])
//                    {
//                        case 'Thunderstorm': $meteoText = 'tempesta';    $meteoImg = "<img src='1.png'  alt='Thunderstorm'>"; break;
//                        case 'Drizzle'     : $meteoText = 'pioggerella'; $meteoImg = "<img src='1.png'  alt='Drizzle'>";      break;
//                        case 'Rain'        : $meteoText = 'pioggia';     $meteoImg = "<img src='5.png'  alt='Rain'>";         break;
//                        case 'Snow'        : $meteoText = 'neve';        $meteoImg = "<img src='10.png' alt='Snow'>";         break;
//                        case 'Atmosphere'  : $meteoText = 'nebbia';      $meteoImg = "<img src='10.png' alt='Atmosphere'>";   break;
//                        case 'Clear'       : $meteoText = 'chiaro';      $meteoImg = "<img src='1.png'  alt='Clear'>";        break;
//                        case 'Clouds'      : $meteoText = 'nuvoloso';    $meteoImg = "<img src='7.png'  alt='Clouds'>";       break; 
//                        case 'Extreme'     : $meteoText = 'estremo';     $meteoImg = "<img src='9.png'  alt='Extreme'>";      break; 
//                    }
                    for ($i=0; $i<count($weather['list']);$i++) : 
                    $time = '@'.$weather['list'][$i]['dt'];
                    $dateTimeEnd = new DateTime($time);
                   
                    switch ( $dateTimeEnd ->format('l') )
                    {
                        case 'Monday':  $day = 'Lunedì'; break;
                        case 'Tuesday': $day = 'Martedì'; break;
                        case 'Wednesday': $day = 'Mercoledì'; break;
                        case 'Thursday': $day = 'Giovedì'; break;
                        case 'Friday': $day = 'Venerdì'; break;
                        case 'Saturday': $day = 'Sabato'; break;
                        case 'Sunday': $day = 'Domenica'; break;
                    }
                   // var_dump($weather['list'][$i]['rain']['3h']); echo '\n';
                    //if ( $weather['list'][$i]['rain']['3h'] ) { echo 'true';} else  { echo 'null';}
                    
                    $meteo[$i] = array(
                    "day" =>       $day, 
                    "date" =>      $dateTimeEnd ->format('d M Y'),
                    "time" =>      (intval($dateTimeEnd ->format('H'))+1).':00', 
                    "main" =>      $weather['list'][$i]['weather']['0']['main'],
                    "descr" =>     $weather['list'][$i]['weather']['0']['description'], 
                    "icona" =>     $weather['list'][$i]['weather']['0']['icon'],            
                    "tempAvg" =>   $weather['list'][$i]['main']['temp'],
                    "tempMin" =>   $weather['list'][$i]['main']['temp_min'],
                    "tempMax" =>   $weather['list'][$i]['main']['temp_max'],
                    "nuvole" =>    $weather['list'][$i]['clouds']['all'],
                    "vento" =>     round($weather['list'][$i]['wind']['speed'],1),    
                    "pioggia" =>   isset($weather['list'][$i]['rain']['3h']) ? '| '.round($weather['list'][$i]['rain']['3h'],1).'mm' : '',
                    "neve" =>      isset($weather['list'][$i]['snow']['3h']) ? '| '.round($weather['list'][$i]['snow']['3h'],1).'mm' : '',
                    "umidità" =>   $weather['list'][$i]['main']['humidity']
                    );
                    endfor;
                }
                else
                {
                    $errorMessage = 'errore: questa città non esiste'; 
                }
            }
            else  // esiste ma il suo valore è false
            {
                $errorMessage = 'errore: non hai digitato nessun valore';  
            }
        }
    }                  
?>