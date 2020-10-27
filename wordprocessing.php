<?php
	$wordlist = array("maverick","ranger","rocket","chicago","bear","wizard","seattle","atlanta","miami","austin","boston","pittsburgh","heat","saint","hawk","king");
	
	$userwords=$_GET["q"]; 
	$custwordlist = $_GET["w"];
	if(!empty(($custwordlist)&&isset($custwordlist))){
		$custwordlist=explode(" ",$custwordlist);
		$wordlist=$custwordlist;
	}
	
	
	$results="";
	if ($userwords!== ""){ 
		$userword=explode(" ",$userwords);
		for($i = 0 ; $i < count($userword);$i++){
		  for($j = 0 ; $j < count($wordlist);$j++){
		        $len=strlen($userword[$i]);
				if (strpos($userword[$i],$wordlist[$j])!==false){
				    if(strlen($wordlist[$j])===strlen($userword[$i])){
					 $userword[$i]= str_repeat("*",$len)." ";
					}
					else{
						$others = substr($userword[$i],strlen($wordlist[$j]),strlen($userword[$i]));
						for($k = 0 ; $k < count($wordlist);$k++){
							if(strpos($others,$wordlist[$k])!==false){			
							 $userword[$i]= str_repeat("*",$len)." ";	
							}
						}						
				    }					 
				}
		  }
			$results.=$userword[$i]." ";
		}
	}
	
	echo $results==="" ? "Please enter your text!" : $results;
?>
