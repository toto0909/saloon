<?php
//天気情報を返すAPI.「OpenWeather」よりJSON形式で情報取得

// 文字コード設定
header('Content-Type: application/json; charset=UTF-8');

function get_json( $type = null , $int){

    switch ($int) {
        case 1:
            $city = "Matsumoto,jp"; //松本市;
            break;
        case 2:
            $city = "Saitama,jp"; //新座市;
            break;
        case 3:
            $city = "Tokyo,jp"; //豊島区;
            break;
        case 4:
            $city = "Hadano,jp"; //秦野市;
            break;
    }

    $appid = "5baa249d5fb92444149857fd6988abfa";
    $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&APPID=" . $appid;
  
    $json = file_get_contents( $url );
    $json = mb_convert_encoding( $json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN' );
    $json_decode = json_decode( $json );
  
    //現在の天気
    if( $type  === "weather" ):
      $out = $json_decode->weather[0]->main;
    //現在の天気アイコン
    elseif( $type === "icon" ):
      $out = "<img src='https://openweathermap.org/img/wn/" . $json_decode->weather[0]->icon . "@2x.png'>";
    //現在の気温
    elseif( $type  === "temp" ):
      $out = $json_decode->main->temp;
      //現在の湿度
    elseif( $type  === "humidity" ):
        $out = $json_decode->main->humidity;
    //パラメータがないときは配列を出力
    else:
      $out = $json_decode;
    endif;
  
    return $out;
  }


?>