<!--株価を5秒に一回返すAPI-->

<!--$stability 0.0~1.0 景気不安定度-->
<!--$stock_price_in 入力株価-->
<!--$stock_price_out 出力株価-->

<?php

    //景気変動率を出力
    //安定度(stability)が低い程変動が激しい
    function get_var_business($stability){
        //株価変動に対する乱数生成
        $rand_rate = rand (round(100 - $stability * 3) , round(100 + $stability * 3) ) * 0.01;   //安定 1.00~1.00倍 不安定0.97~1.03倍

        return $rand_rate;
    }

    //5秒に1回株価計算
    function get_stock_price($stock_price_in, $rand_rate){
        $timing = time(); //現在のUNIX time取得
        
        if($timing % 5 == 0){
            $stock_price_out = $stock_price_in * $rand_rate;
        }else{
            $stock_price_out = $stock_price_in;
        }
        return $stock_price_out;
    }

?>
