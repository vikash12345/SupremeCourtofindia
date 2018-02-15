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

		
		
		scraperwiki::save_sqlite(array('num'), array('num' => $checking,
 'link' => $linkabc,
 'name' => $name,
 'dairyno'=> $dairyno
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
