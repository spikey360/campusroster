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


if($_COOKIE['auth']!="1"){
echo "<html><head>
<meta http-equiv='REFRESH' content='0;url=./'></HEAD>
</head><body></body></html>";
exit();
}

?>
<html>
<head><title>GCELT1014/CampusRoster/View</title>
<link href="../style/style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="../css/jquery-ui.custom.min.css" />
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.custom.min.js"></script>
<script src="../js/submit.js"></script>
<script src="../js/validate.js"></script>
<script>
$(function() {
$( "#tabs" ).tabs();
});

function toTab(x){
document.getElementById(x).click();
}

function sendMsg(f){
t="0";
tos=document.getElementById('gl');
for(i=0;i<tos.length;i++){
	if(tos.options[i].selected){
		t=tos.options[i].value;
		}
	}
s=document.getElementById('subj').value;
m=document.getElementById('msg').value;
$.ajax({
	type: "POST",
	url: "sendmsg.php",
	data: {t:t, s:s, m:m, f:f}
}).done(function(x){
if(x=="MS") alert("Sent!");
else alert("Failed.."+x);
});
}

</script>
</head>
<body>
<div class="banner">GCELT1014/CampusRoster</div>
<div align="center"><a href="landing.html">Home</a></div>
<br>
<div class="nav">
<span class="subhead">Messages</span><a onclick="document.location='msgs.php';">(refresh)</a>
<br>

<?php
include('../lib/opendb.php');
$mid=$_COOKIE['id'];
if(!empty($mid)){
?>
<div id="tabs">
<ul>
<li><a href="#tabs-1" id="tabBasic" >Inbox</a></li>
<li><a href="#tabs-2" id="tabContact">Sent</a></li>
<li><a href="#tabs-3" id="tabAcademics">Compose</a></li>
</ul>
<?php
$query="SELECT subj, msg, monitors.user, timestamp, messages.read FROM messages INNER JOIN monitors ON monitors.mid=messages.from WHERE messages.to=0 OR messages.to=$mid ORDER BY timestamp DESC";
$res=mysql_query($query);
if($res){
echo "<div id='tabs-1'>";
if(mysql_num_rows($res)>0){
while($row=mysql_fetch_row($res)){
if($row[4]=="0") echo "*";
echo "<br>From <u>".$row[2]."</u> at $row[3]<br>";
echo "Subject <b>".$row[0]."</b><br>";
echo "$row[1]<br><br>";

}
$query="UPDATE messages SET `read`=1 WHERE `to`=$mid";
$res=mysql_query($query); //mark all messages as read
}
echo "</div>";
}else{
echo "Error fetching inbox.."; //query error
}

//sent
$query="SELECT subj, msg, monitors.user, timestamp FROM messages INNER JOIN monitors ON monitors.mid=messages.to WHERE messages.from=$mid ORDER BY timestamp DESC";
$res=mysql_query($query);
if($res){
echo "<div id='tabs-2'>";
if(mysql_num_rows($res)>0){
while($row=mysql_fetch_row($res)){
echo "<br>To <u>".$row[2]."</u> at $row[3]<br>";
echo "Subject <b>".$row[0]."</b><br>";
echo "$row[1]<br><br>";

}
}
echo "</div>";
}else{
echo "Error fetching sent messages.."; //query error
}
echo "<div id='tabs-3'>";
$query="SELECT user, mid FROM monitors";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
echo "To <select id='gl'><option value='0'>Everyone</option>";
while($row=mysql_fetch_row($res)){
	echo "<option value='".$row[1]."'>".$row[0]."</option>";
}
echo "</select><br>";
echo "Subject<br><input type='text' id='subj'/><br><br>";
echo "Your message<br><textarea id='msg'></textarea><br><br>";
echo "<input type='button' class='submitButton' value='SEND' id='subButton' onclick=sendMsg('".$mid."')><br><br>";
}
}else{
echo "Error fetching list of members..";
}
echo "</div>"
?>
</div>
<?php
}
else{
echo "User id incompatible";
}
include('../lib/closedb.php');
?>
</div>
</body>
</html>
