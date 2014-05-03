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
<script src="../js/admin.js"></script>
</head>
<body>
<div class="banner">GCELT1014/CampusRoster</div>
<div align="center"><a href="landing.html">Home</a></div>
<br>
<?php
include('../lib/opendb.php');
?>
<div class="nav">
<span class="subhead">Monitors</span><a onclick="document.location='monitors.php';">(refresh)</a><br>(can view registrations)
<?php
$query="SELECT user, banned FROM monitors";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
echo "<table>";
while($row=mysql_fetch_row($res)){
echo "<tr><td><b>$row[0]</b></td><td>";
if($row[1]=="1"){echo "is Banned";}else echo "";
echo "</td></tr>";


}
echo "</table>";
}
}else{
echo "Database error..";
}
?>
<br><br>
<span class="subhead">Moderators</span><a onclick="document.location='monitors.php';">(refresh)</a><br>(can edit registrations)
<?php
$query="SELECT user, banned FROM monitors WHERE moderator=1";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
echo "<table>";
while($row=mysql_fetch_row($res)){
echo "<tr><td><b>$row[0]</b></td><td>";
if($row[1]=="1"){echo "is Banned";}else echo "";
echo "</td></tr>";


}
echo "</table>";
}
}else{
echo "Database error..";
}
?>
<br><br>
<span class="subhead">Administrators</span><a onclick="document.location='monitors.php';">(refresh)</a><br>(can grant privileges or revoke them)
<?php
$query="SELECT user, banned FROM monitors WHERE admin=1";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
echo "<table>";
while($row=mysql_fetch_row($res)){
echo "<tr><td><b>$row[0]</b></td><td>";
if($row[1]=="1"){echo "is Banned";}else echo "";
echo "</td></tr>";


}
echo "</table>";
}
}else{
echo "Database error..";
}

if($_COOKIE['gs']=='1'){
?>
<br><br>
<span class="subhead">Bans</span><br>(make/break bans)
<br>
<?php
$query="SELECT user, mid FROM monitors";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
echo "<select id='banlist'>";
while($row=mysql_fetch_row($res)){
echo "<option value='$row[1]'>$row[0]</option>";
}
echo "</select>";
echo "<input type='button' class='nextButton' value='Ban' onclick='actionBan(true)'>";
echo "<input type='button' class='nextButton' value='Break ban' onclick='actionBan(false)'>";
}
}else{
echo "Database error..";
}
?>
<br><br>
<span class="subhead">Moderations</span><br>(make/break moderators)
<br>
<?php
$query="SELECT user, mid FROM monitors";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
echo "<select id='modlist'>";
while($row=mysql_fetch_row($res)){
echo "<option value='$row[1]'>$row[0]</option>";
}
echo "</select>";
echo "<input type='button' class='nextButton' value='Make Moderator' onclick='actionMod(true)'>";
echo "<input type='button' class='nextButton' value='Break Moderator' onclick='actionMod(false)'>";
}
}else{
echo "Database error..";
}
?>
<br><br>
<span class="subhead">Create Monitor</span><br>(make a new Monitor account)
<br>
<table>
<tr><td>User</td><td><input type="text" id="user"></td></tr>
<tr><td>Password</td><td><input type="text" id="pass"></td></tr>
<tr><td><input type="button" class="nextButton" value="Create" onclick='actionMakeMonitor()'></td><td></td></tr>
</table>
<br><br><br>
</div>
</body>
</html>
<?php
}
include('../lib/closedb.php');
?>
