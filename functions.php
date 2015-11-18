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
    function convBase($numberInput, $fromBaseInput, $toBaseInput)
	{
	    if ($fromBaseInput==$toBaseInput) return $numberInput;
	    
	    $fromBase = str_split($fromBaseInput,1);
	    $toBase = str_split($toBaseInput,1);
	    $number = str_split($numberInput,1);
	    $fromLen=strlen($fromBaseInput);
	    $toLen=strlen($toBaseInput);
	    $numberLen=strlen($numberInput);
	    $retval='';
		$base10='';
		
	    if ($toBaseInput == '0123456789') {
	        $retval=0;
	        for ($i = 1;$i <= $numberLen; $i++) {
		        $retval = bcadd($retval, bcmul(array_search($number[$i-1], $fromBase),bcpow($fromLen,$numberLen-$i)));
	        }
	        return $retval;
	    }
	    if ($fromBaseInput != '0123456789') {
	        $base10 = convBase($numberInput, $fromBaseInput, '0123456789');
	    } else {
	        $base10 = $numberInput;
		}
	    if ($base10<strlen($toBaseInput)) {
	        return $toBase[$base10];
	    }
	    while($base10 != '0') {
	        $retval = $toBase[bcmod($base10,$toLen)].$retval;
	        $base10 = bcdiv($base10,$toLen,0);
	    }
	    return $retval;
	}
?>