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
function editDetails(deid){
//basics and mail

roll=document.getElementById('roll').value;

name=document.getElementById('name').value;

stream=document.getElementById('stream').value;

dob=document.getElementById('dob').value;

sex=document.getElementById('sex').value;

strm=stream;
	
//history
p10=document.getElementById('p10').value;
b10=document.getElementById('b10').value;
y10=document.getElementById('y10').value;
p12=document.getElementById('p12').value;
b12=document.getElementById('b12').value;
y12=document.getElementById('y12').value;
cat=document.getElementById('category').value;
pDip=document.getElementById('pDip').value;
bDip=document.getElementById('bDip').value;
yDip=document.getElementById('yDip').value;
rWB=document.getElementById('rWB').value;
rJEL=document.getElementById('rJEL').value;

//contact
mail=document.getElementById('mail').value;

add1=document.getElementById('add1').value;

add2=document.getElementById('add2').value;

ph=document.getElementById('ph').value;

//academics
cb=document.getElementById('cb').value;
pb=document.getElementById('pb').value;
p1=document.getElementById('p1').value;
p2=document.getElementById('p2').value;
p3=document.getElementById('p3').value;
p4=document.getElementById('p4').value;
p5=document.getElementById('p5').value;
p6=document.getElementById('p6').value;
p7=document.getElementById('p7').value;
p8=document.getElementById('p8').value;
cgpa=document.getElementById('cgpa').value;
avg=document.getElementById('avg').value;

//training
td=document.getElementById('td').value;
tw=document.getElementById('tw').value;


//set status
document.getElementById('status').innerHTML="Submitting...";
$.ajax({
	type: "POST",
	url: "xedit.php",
	data:{r: roll, m: mail, n: name, sx: sex, str: strm, dob: dob, p10: p10, b10: b10, y10: y10, p12: p12, b12: b12, y12: y12, pDip: pDip, bDip: bDip, yDip: yDip, cat: cat, rWB: rWB, rJEL: rJEL, add1: add1, add2: add2, ph: ph, pb: pb,cb: cb, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6, p7: p7, p8: p8, cgpa: cgpa, avg: avg, td: td, tw: tw, deid: deid}
	}
).done(
	function(x){
		if(x=="RS"){
		 
		 document.getElementById('status').innerHTML="Submitted successfully";
		 document.getElementById('subButton').disabled=true;
		 //once you have submitted, button stays disabled. Penalty.
		  }
		else if(x.substr(0,2)=="ER"){
		ts=x.substr(2);
		
		document.getElementById('status').innerHTML="Error while submitting. Retry.";
		}
		else{
			window.alert(x);
		}
		
	}
);
}
