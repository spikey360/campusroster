<?php

/*

    CampusRoster
    Copyright (C) <2013> <Riju M>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

*/


//authenticate.php

$mail=$_GET['m'];

if(empty($mail)){
echo "NM";
exit();
}

include('../lib/opendb.php');

$pool="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$randLen=16;
$randString="";
for($i=0;$i<16;$i++){
	$randString.=$pool[rand(0,strlen($pool))];
}
//echo $randString;
//store this up in table of generated strings against a mail address
$query="INSERT INTO generatedRandoms(random, mail) VALUES ('$randString','$mail')";
//echo $query;
$res=mysql_query($query);
//echo $query;
if($res){
echo "AS"; //authentication successfull
}else{
echo "AF"; //authentication failed
}
//mail to that address
///////////////////////
$to      = $m;
$from	= "noreply@gcelt1014.6te.net";
$rt = "gcelt.1014@gmail.com";
$subject = "Mail authentication for GCELT1014/CampusRoster";
$message = "Your authentication string is ".$randString.".\r\nVisit http://gcelt1014.6te.net/campusroster/authmail.php?rand=".$randString."\r\nOr Authenticate by entering your string at http://gcelt1014.6te.net/campusroster/auth/";
$headers = 'From: '.$from . "\r\n" .
    'Reply-To: '.$rt . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
///////////////////////
include('../lib/closedb.php');

?>
