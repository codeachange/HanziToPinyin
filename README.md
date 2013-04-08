HanziToPinyin
=============

PHP汉字转拼音程序，使用从字典导出的2万多汉字和对应的拼音（带声调），并考虑到多音字情况

CopyRight
=========

资源来自网络

Resources
=========

pytable_with_tune.txt 和 pytable_without_tune.txt 分别是带声调和不带声调的汉字拼音对照表，格式是serialize后的array，array格式是：
array(
	'汉'	=>	array('han'),
	'还'	=>	array('hai','huan'),
)
table_ISCCD.txt 是从字典直接导出的文件
functions.php 是示例和一些有用的函数