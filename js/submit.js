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
//submitting details through ajax jquery

var ts="";

function submitDetails(){
//basics and mail

roll=document.getElementById('roll').value;
if(!flashDetails(roll,'Basic','University roll','tabBasic')) return;
name=document.getElementById('name').value;
if(!flashDetails(name,'Basic','Name','tabBasic')) return;
middleName=document.getElementById('middleName').value;
surname=document.getElementById('surname').value;
if(!flashDetails(surname,'Basic','Surname','tabBasic')) return;
stream=document.getElementById('stream');
sexFemale=document.getElementById('female');
dob=document.getElementById('dob').value;
if(!flashDetails(dob,'Basic','Date of Birth','tabBasic')) return;
sex="M";
if(sexFemale.checked){sex="F";}
strm="";
for(i=0;i<stream.length;i++){
	if(stream.options[i].selected){
		strm=stream.options[i].value;
		}
	}
	
//history
p10=document.getElementById('p10').value;
if(!flashDetails(p10,'History','X marks %','tabHistory')) return;
b10s=document.getElementById('b10');
b10="";
for(i=1;i<b10s.length;i++){
	if(b10s.options[i].selected){
		b10=b10s.options[i].value;
		}
	}
if(b10=="OTHER"){b10=document.getElementById('o10').value;}
if(!flashDetails(b10,'History','X Board','tabHistory')) return;
y10=document.getElementById('y10').value;
if(!flashDetails(y10,'History','X passing year','tabHistory')) return;
p12=document.getElementById('p12').value;
if(!flashDetails(p12,'History','XII marks %','tabHistory')) return;
b12s=document.getElementById('b12');
b12="";
for(i=1;i<b12s.length;i++){
	if(b12s.options[i].selected){
		b12=b12s.options[i].value;
		}
	}
if(b12=="OTHER"){b12=document.getElementById('o12').value;}
if(!flashDetails(b12,'History','XII Board','tabHistory')) return;
y12=document.getElementById('y12').value;
if(!flashDetails(y12,'History','XII passing year','tabHistory')) return;
pDip=document.getElementById('pDip').value;
if(lat.checked){if(!flashDetails(pDip,'History','Diploma marks %','tabHistory')) return;}
bDip=document.getElementById('bDip').value;
if(lat.checked){if(!flashDetails(bDip,'History','Diploma Board','tabHistory')) return;}
yDip=document.getElementById('yDip').value;
if(lat.checked){if(!flashDetails(yDip,'History','Diploma passing Year','tabHistory')) return;}
rWB=document.getElementById('rWB').value;
if(!lat.checked){if(!flashDetails(rWB,'History','WBJEE rank','tabHistory')) return;}
rJEL=document.getElementById('rJEL').value;
if(lat.checked){if(!flashDetails(rJEL,'History','JELET rank','tabHistory')) return;}
category=document.getElementById('lat');
cat="WBJEE";
if(lat.checked){cat="Lateral";}
//contact
mail=document.getElementById('mail').value;
if(!flashDetails(mail,'Contact','e-mail','tabContact')) return;
add1=document.getElementById('add1').value;
if(!flashDetails(add1,'Contact','Permanent Address','tabContact')) return;
add2=document.getElementById('add2').value;
if(!flashDetails(add2,'Contact','Present Address','tabContact')) return;
ph=document.getElementById('ph').value;
if(!flashDetails(ph,'Contact','Phone','tabContact')) return;
//academics
cb=document.getElementById('cb').value;
pb=document.getElementById('pb').value;
p1=document.getElementById('p1').value;
if(!lat.checked){if(!flashDetails(p1,'Academics','SGPA1','tabAcademics')) return;}
p2=document.getElementById('p2').value;
if(!lat.checked){if(!flashDetails(p2,'Academics','SGPA2','tabAcademics')) return;}
p3=document.getElementById('p3').value;
if(!flashDetails(p3,'Academics','SGPA3','tabAcademics')) return;
p4=document.getElementById('p4').value;
if(!flashDetails(p4,'Academics','SGPA4','tabAcademics')) return;
p5=document.getElementById('p5').value;
if(!flashDetails(p5,'Academics','SGPA5','tabAcademics')) return;
p6=document.getElementById('p6').value;
p7=document.getElementById('p7').value;
p8=document.getElementById('p8').value;
cgpa=document.getElementById('cgpa').value;
avg=document.getElementById('avg').value;
if(!flashDetails(avg,'Academics','Avg GPA','tabAcademics')) return;
//training
td=document.getElementById('trainDetails').value;
if(!flashDetails(td,'Experience','Training details','tabExperience')) return;
tw=document.getElementById('trainWeeks').value;
if(!flashDetails(tw,'Experience','Training duration','tabExperience')) return;

//set status
document.getElementById('status').innerHTML="Submitting...";
$.ajax({
	type: "POST",
	url: "tools/submit.php",
	data:{r: roll, m: mail, n: name, mn: middleName, sn: surname, sx: sex, str: strm, dob: dob, p10: p10, b10: b10, y10: y10, p12: p12, b12: b12, y12: y12, pDip: pDip, bDip: bDip, yDip: yDip, cat: cat, rWB: rWB, rJEL: rJEL, add1: add1, add2: add2, ph: ph, pb: pb,cb: cb, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6, p7: p7, p8: p8, cgpa: cgpa, avg: avg, td: td, tw: tw}
	}
).done(
	function(x){
		if(x=="RS"){
		 
		 document.getElementById('status').innerHTML="<b>Submitted successfully</b>";
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

function checkJobStatus(){
j=document.getElementById('job').value;
if(j.length>0){
$.ajax({
type: "GET",
url: "tools/getStatus.php?job="+j
}).done(
function(x){
if(x=="JE"){window.alert("Invalid Job#");}
else if(x=="FE"){window.alert("Error while fetching records");}
else{
pc=parseInt(x);
$( "#progressbar" ).progressbar({
value: pc
});
if(pc==100){
document.getElementById("res").innerHTML="<a href='tools/getResult.php?job="+document.getElementById('job').value+"'>Result</a>";
window.alert("Job Done!!!");
}else{
window.setTimeout('checkJobStatus()',500);

}
}
}
);
}
}
