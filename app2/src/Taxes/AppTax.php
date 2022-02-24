<?php

namespace App\Taxes;

use Cake\Core\Configure;

class AppTax
{
    /*
     * function 
     */
    // private $tax_rate = 1.1; プロパティに値をセットしても関数内で変数が使えなかったので、app2/config/const.phpに税率の値をセットした
    public static function tax($val)
    {
        $tax_rate = Configure::read('tax_rate');//税率を変更したい場合はapp2/config/const.phpのtax_rateの値を変える
        $val *= $tax_rate;
        return (int)round($val);
    }

    public static function pre_tax($val)
    {
        $tax_rate = Configure::read('tax_rate');
        $val /= $tax_rate;
        return (int)round($val);
    }
}
