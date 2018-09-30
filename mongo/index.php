
<?php
 if($_GET['button1']){q1();}
 if($_GET['button2']){q2();}
 if($_GET['button3']){q3();}

	
 function q1()
{
	$m = new MongoClient();
	$db = $m->test;
	$collection  = $db->fir;
  $cursor = $collection->distinct("DISTRICT");
  foreach ( $cursor as $district ){
	$val = $collection->count(['DISTRICT' => $district]);
	if($val > $max){
		$max = $val;
		$place1 = $district;
	}
	}
 	echo "<script type='text/javascript'>alert('District with maximum reported crime is $place1 No of 			criminal cases reported in $place1 is $max')</script>";
 }

 function q2()
 {
	$min=999999;
   $m = new MongoClient();
	$db = $m->test;
	$collection  = $db->fir;
  $cursor = $collection->distinct("Act_Section");
  foreach ( $cursor as $act ){
	$val = $collection->count(['Act_Section' => $act]);
	if($val > $max){
		$max = $val;
		$max_act = $act;
	}
	if($val < $min){
		$min = $val;
		$min_act = $act;
	}
	}
 	echo "<script type='text/javascript'>alert('maximum reported crime is $max_act and minimum reported crime is  $min_act')</script>";
 }

function q3()
{
    $m = new MongoClient();
	$db = $m->test;
	$collection  = $db->fir;
  $cursor = $collection->distinct("PS");
  foreach ( $cursor as $ps ){
	$val = $collection->count(['PS' => $ps]);
        $vali = $collection->count(['PS' => $ps , 'Status' => 'Pending']);
        $temp = $vali/$val;
	#echo $ps ."and". $temp;
        if($temp > $max_ineff)
     {
        $max_ineff = $temp;
        $ps_ineff = $ps;
     }
}
	$max_inefff=$max_ineff * 100;
	echo "<script type='text/javascript'>alert('most inefficient police Station is $ps_ineff and its inefficiency is   $max_inefff%')</script>";
          
        //echo nl2br("\n");




}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
  </head>
  <body>
    <button id="btnfun1" name="btnfun1" onClick='location.href="?button1=1"'>Maximum crime District</button>
    <button id="btnfun2" name="btnfun2" onClick='location.href="?button2=1"'>Maximum and Minimum crime Occurred</button>
 <button id="btnfun3" name="btnfun3" onClick='location.href="?button3=1"'>Most Inefficient Police Station</button>
  </body>
</html>
