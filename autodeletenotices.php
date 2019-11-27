<?php
global $connection;
echo"Connected";
$exp_date="2017/10/19";
$today_date=date('2017/10/19');

//Conversion of a date to strtotime
$exp=strtotime($exp_date);
$td=strtotime($today_date);

//Comparison  using if logic
if($td>$exp){
    echo"Notice Expired";
}
else{
    $x=abs(floor($diff/(60*60*24)));
    $diff=$td-$exp;
    echo"Product not expired.";
    echo"<br/> Days :".$x;
}

?>