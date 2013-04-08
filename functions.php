<?php
	
	// Example
	header('Content-Type: text/html; charset=utf-8');
	$pytable = unserialize(file_get_contents('pytable_with_tune.txt'));
	
	$str = '我是在 New York 出生的中国人。'; // “的”和“中”是多音字
	$str_arr = utf8_str_split($str);
	$result = array('');
	foreach($str_arr as $char){
		if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$char)){
			$pinyin = $pytable[$char];
			$temp_result = array();
			foreach($pinyin as $py){
				foreach($result as $v){
					$temp_result[] = $v.$py.' ';
				}
			}
			$result = $temp_result;
		}else{
			foreach($result as $k=>$v){
				$result[$k] .= $char;
			}
		}
	}
	// “的”有3种读音，“中”有2种，所以有6种组合
	print_r($result);exit;
	
	
	// 作用类似于 str_split ，兼容UTF-8字符
	function utf8_str_split($str,$split_len=1){
		if(!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1){
			return FALSE;
		}
		$len = mb_strlen($str, 'UTF-8');
		if ($len <= $split_len){
			return array($str);
		}
		preg_match_all('/.{'.$split_len.'}|[^\x00]{1,'.$split_len.'}$/us', $str, $ar);
		return $ar[0];
	}
	
	