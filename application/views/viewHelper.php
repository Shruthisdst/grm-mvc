<?php

class viewHelper extends View {

    public function __construct() {


    }

    public function displayBookTitle($bcode, $btitle, $searchWord)
    {
		if(($bcode == '285') || ($bcode == '324') || ($bcode == '325'))
		{
			$btitle = preg_replace("/$searchWord/", "<span class='searchWord'>$searchWord</span>", $btitle);
			$path = '<a href="' . GRM_URL . $bcode . '/index.djvu" target="_blank">' . $btitle . '</a>';
		}
		else
		{
			$btitle = preg_replace("/$searchWord/", "<span class='searchWord'>$searchWord</span>", $btitle);
			$path = '<a href="' . BASE_URL . 'listing/treeview/' . $bcode . '">' . $btitle . '</a>';
		}
		return $path;
	}

	public function displaySearchTitle($bcode, $title, $page, $searchWord)
	{
		$title = preg_replace('/ — /',"—", $title);
		$words = preg_split('/ /', $title);
		$searchWords = preg_split('/ /', $searchWord);
		foreach($searchWords as $sWord)
		{
			$searchList = preg_grep('/' . $sWord . '/', $words);
		}
		$title = preg_replace('/' . $searchWord . '/', '<span class="searchWord">' . $searchWord . '</span>', $title);
		$key = key($searchList);
		$left = $key-10;
		$right = $key+10;
		$left = ($left < 0) ? 0 : $left;
		$right = ($right > count($words)) ? count($words) : $right;
		$right = $right-$left;
		$output = array_slice($words, $left, $right);
		$output = implode(" ", $output);
		$output = preg_replace('/' . $searchWord . '/', '<span class="searchWord">' . $searchWord . '</span>', $output);
		$djvuLink = GRM_URL . $bcode . '/index.djvu?djvuopts&amp;page='.$page.'.djvu&amp;zoom=page';
		$titlePath = '<a href="'.$djvuLink.'" target="_blank">.............. '.$output.' ...............</a>';
		return $titlePath;
	}

	public function displayTitle($bcode, $title, $page)
	{
		$title = preg_replace('/ — /',"—", $title);
		$djvuLink = GRM_URL . $bcode . '/index.djvu?djvuopts&amp;page='.$page.'.djvu&amp;zoom=page';
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
