<?php
function show_product($data)
{	
	$cat = $_GET['cat'];
	foreach ($data[$cat] as $key => $el)
	{
		if($key != "img")
		{
            echo "<figure class=\"left cold\"><img class='img' src='" . $el['img'] . "' 
            alt=\'" . $key . 
            " title='" . $key.
            "'/><span id=\"cold-2\">$ 2.50</span><input class=\"bt-add\" type=\"submit\" name=\"add-basket\" value=\"ADD\"></figure>";

		}
	}
}
?>