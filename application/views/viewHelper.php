<?php

class viewHelper extends View {

    public function __construct() {


    }

    public function displayTitle($bcode, $title, $page)
    {
		$title = preg_replace('/—/',"",$title);
		$djvuLink = VOL_URL . $bcode . '/index.djvu?djvuopts&amp;page='.$page.'.djvu&amp;zoom=page';
		$titlePath = '<a href="'.$djvuLink.'" target="_blank">'.$title.'</a>';
		return $titlePath;
	}
    function display_stack($stack)
	{
		for($j=0;$j<sizeof($stack);$j++)
		{
			$disp_array = $disp_array . $stack[$j] . ",";
		}
		return $disp_array;
	}

	function display_tabs($num)
	{
		$str_tabs = "";
		
		if($num != 0)
		{
			for($tab=1;$tab<=$num;$tab++)
			{
				$str_tabs = $str_tabs . "\t";
			}
		}
		
		return $str_tabs;
	}

}

?>
