<?php

namespace common\models;

use backend\modules\account\models\AccountName;
use Yii;
use yii\helpers\ArrayHelper;

class Common {

    public static function months()
    {
        return [
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December',
		];
    }
	
	
	
	public static function months_short()
    {
        return [
			1 => 'Jan',
			2 => 'Feb',
			3 => 'Mac',
			4 => 'Apr',
			5 => 'Mei',
			6 => 'Jun',
			7 => 'Jul',
			8 => 'Ogos',
			9 => 'Sep',
			10 => 'Okt',
			11 => 'Nov',
			12 => 'Dis',
		];
    }
	
	public static function getHari($number){
		$arr = self::hari_list();
		return $arr[$number];
	}
	
	public static function getTarikhHari($date){
		$tarikh = self::dateFormat($date);
		$num_hari = date('N', strtotime($date));
		$str_hari = self::getHari($num_hari);
		return $tarikh . ' ('.$str_hari.')';
	}
	
	private static function dateFormat($date){
		$day = date('j', strtotime($date));
		$month_num = date('n', strtotime($date));
		$month_bm = self::months();
		$month_str = $month_bm[$month_num];
		$year = date('Y', strtotime($date));
		return $day . ' ' . $month_str . ' ' . $year;
	}
	
	public static function paymentMedium(){
	    return [
	        1 =>'Online Banking',
	        2 =>'Cheque',
	        3 => 'Payment Gateway',
	        4 => 'eWallet',
	    ];
	}
	
	public static function hari_list()
    {
        return [
			7 => 'Ahad',
			1 => 'Isnin',
			2 => 'Selasa',
			3 => 'Rabu',
			4 => 'Khamis',
			5 => 'Jumaat',
			6 => 'Sabtu',
		];
    }
	
	public static function getMonth($str){
		$list = self::months_short();
		foreach($list as $key=>$val){
			$m = strtolower($val);
			$str = strtolower($str);
			if($m == $str){
				return $key;
			}
		}
		return 0;
	}
	
	public static function date_malay($str){
		$day = date('d', strtotime($str));
		$month = date('m', strtotime($str)) + 0;
		$month_malay = self::months()[$month];
		$year = date('Y', strtotime($str));
		return $day . ' ' . $month_malay . ' ' . $year;
	}
	
	public static function date_malay_short($str){
		$day = date('d', strtotime($str));
		$month = date('m', strtotime($str)) + 0;
		$month_malay = self::months_short()[$month];
		$year = date('Y', strtotime($str));
		return $day . ' ' . $month_malay . ' ' . $year;
	}
	
	public static function methodList(){
	    
	    $result = AccountName::find()
	    ->where(['category' => 2]) // all current assets
	    ->andWhere(['not in', 'id', [18,25]]) //except client debtor & Staff Account
	    ->all();
	    return ArrayHelper::map($result, 'id', 'acc_name');
	    
	}
	
	
	public static function days(){
		return [1 => "Ahad", 2 => "Isnin", 3 => "Selasa", 4 => "Rabu", 5 =>"Khamis", 6 => "Jumaat", 7 => "Sabtu"];
	}
	
	public static function years()
    {
		$curr = date('Y') + 0;
		$last = $curr - 1;
        return [
			$curr => $curr,
			$last => $last,
		];
    }
    
    public static function arrayToStr($array){
        if($array){
            $str = '';
            $i = 0;
            foreach($array as $a){
                $comma = $i == 0 ? '': ',';
                $str .= $comma.$a;
                $i++;
            }
            return $str;
        }else{
            return '';
        }
    }
	
	public static function status(){
		return [0 => 'Not Started', 1 => 'Started', 3 => 'Submitted'];
	}
}
