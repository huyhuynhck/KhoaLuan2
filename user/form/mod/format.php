<?php 
class format{
    public function format_money($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
        if (is_numeric($number)) { 
            // a number
            if (!$number) { 
                $money = ($cents == 2 ? '0.00' : '0');
            } else { 
            if (floor($number) == $number) { // whole number
                $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
            } else { // cents
                $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
            } // integer or decimal
            } // value
            return $money.'';
        } 
    }

    public function decode_money($number) {
        $money_raw= trim(str_replace("","",$number));
        $money  = trim(str_replace(",","",$money_raw));
        return $money;
    } 

    public function format_number($number) {
        // $money_raw= trim(str_replace("","",$number));
        // $number  = trim(str_replace(",","",$money_raw));
        return number_format($number);
    } 
}


?>