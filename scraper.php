<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$years	= array('2000');
for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$RecordLoop =  0;
    	$RecordFlag =   true;
	while($RecordFlag == true) 
	{
	$RecordLoop	+=  1;
	$linkabc		=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='. $RecordLoop .'&d_yr='.$years[$mainpage];
	$htmlcheck		=	file_get_html($linkabc);
	if($htmlcheck)
	{
	$checking		=	$htmlcheck->find("h5[plaintext^=Diary No]",0)->plaintext;
	$name			=	$htmlcheck->find("h5[2]",0)->plaintext;
	$dairyno		=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[1]/td[2]/div",0)->plaintext;
	$cno			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[2]/td[2]/div",0)->plaintext;
	$presentlast		=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[3]/td[2]",0)->plaintext;
	$status			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[4]/td[2]/font",0)->plaintext;
	$dtype			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[5]/td[2]/font",0)->plaintext;
	$cat			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[6]/td[2]",0)->plaintext;
	$act			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[7]/td[2]",0)->plaintext;
	$patone			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[8]/td[2]/p",0)->plaintext;
	$pattwo			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[9]/td[2]/p",0)->plaintext;
	$adv			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[10]/td[2]/p",0)->plaintext;
	$radv			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[11]/td[2]",0)->plaintext;
	$usec			=	$htmlcheck->find("//*[@id='collapse1']/div/table/tbody/tr[12]/td[2]",0)->plaintext;
		
		scraperwiki::save_sqlite(array('num'), array('num' => $checking,
 'link' => trim($linkabc),
 'name' => trim($name),
 'dairyno'=> trim($dairyno),
'cno'=> trim($cno),
'presentlast'  => trim($presentlast),
'status'  => trim($status),	
'dtype'  => trim($dtype),
'cat'  => trim($cat),
'act'  => trim($act),
'patone'  => trim($patone),	
'pattwo'  => trim($pattwo),
'adv'  => trim($adv),
'radv'  => trim($radv),
'usec'  => trim($usec)					     
));
	}
		
		if (!$checking) 
		{
			$RecordFlag =   false;
			break;
			echo "Link finished";
		}
		
		
		
		
		
	} 
}
?>
