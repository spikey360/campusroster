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

function actionBan(make){
m="m";
if(!make)
m="b";
id="";
bl=document.getElementById('banlist')
for(i=0;i<bl.length;i++){
	if(bl.options[i].selected){
		id=bl.options[i].value;
		}
	}

$.ajax({ type: "GET", url: "admintools.php?a=b&m="+m+"&id="+id}).done(function(x){
if(x=="F"){alert("Failed..");
}
if(x=="S"){alert("Successful!");
}
else{}
});
}

function actionMod(make){
m="m";
if(!make)
m="b";
id="";
bl=document.getElementById('modlist')
for(i=0;i<bl.length;i++){
	if(bl.options[i].selected){
		id=bl.options[i].value;
		}
	}

$.ajax({ type: "GET", url: "admintools.php?a=m&m="+m+"&id="+id}).done(function(x){
if(x=="F"){alert("Failed..");
}
if(x=="S"){alert("Successful!");
}
else{}
});
}

function actionMakeMonitor(){
u=document.getElementById('user').value;
p=document.getElementById('pass').value;
if(u.length==0 || p.length==0){ alert("Username/Password not supplied"); return;}

$.ajax({ type: "GET", url: "admintools.php?a=mo&u="+u+"&p="+p}).done(function(x){
if(x=="F"){alert("Failed..");
}
if(x=="S"){alert("Successful!");
}
else{}
});
}
