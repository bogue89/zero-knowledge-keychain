<?php
    function pr($array){
		if(is_array($array))
		{
			echo 'Array (';
			foreach($array as $key => $value)
			{
				echo "<pre style=\"margin-left:50px\";>";
				echo "<strong>".$key."</strong> => ";
				pr($value);
				echo "</pre>";
			}
			echo ")<br />";
		} else if($array!='')
			echo $array."<br />";
		else{
			var_dump($array);
			echo "<br />";
		}
        
    }
?>