 <style>
 p{
	 height:5px;
	 top:0px;
 }
 h1,h3,h2{
	 height:8px;
 }
 </style>
 <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
            window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
                               
                               
                                <?php
								include('dbconnection/connection.php');
//include('org2.php');
				 $id=$_GET['id'];
						 $id2=$_GET['id1'];
						 $Class=$_GET['id3'];
						 $Section=$_GET['id4'];
						 $Medium=$_GET['id5'];
						 $acd_year=$_GET['id6'];
						include("config.php");
						$sq=mysqli_query($link,"select * from marks_entry where Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id'");
						while($re=mysqli_fetch_array($sq)){
							$test=$re['test'];
							$sub=$re['sub'];
							$rnum=$re['roll_number'];
							$name=$re['frist_name1'];
							$med=$re['Medium']; 
							$marks=$re['marks'];
							$Class=$re['Class'];
							$Section=$re['Section'];
							$test=$re['test'];
						     	 	
						}
						?>
                       
                       
                        
                           <?php
include('config.php');
$sql="select * from organization";
$res=mysqli_query($link,$sql) or die(mysql_error());
while($row=mysqli_fetch_array($res)){
	$orgname=$row['orgname'];
	$oaddr=$row['address'];
	$phone=$row['phone'];
	
	
}
?>





<?php				 	// $mna="select b.health,b.remarks, a.id, a.fname,a.flangruage,a.admno,b.Height,b.Weight,a.mname,a.Date_of_Birth  from student_register a ,height b  where a.Roll_Number='$id' and  a.Class='$Class' and a.section='$Section' and  a.Medium='$Medium' and a.Academic_Year='$acd_year'";
						
						 $mna="select
						* from student_register
						 where rollno='$id' and class='$Class' and section='$Section' and medium='$Medium'
						  and acyear='$acd_year'";
						
						
						$sql=mysqli_query($link,$mna);
						$r=mysqli_fetch_array($sql);
							 $fname=$r['fname'];
							 $roll=$r['rollno'];
						  $fat=$r['fname'];
						    $flang=$r['flangruage'];
							$Admission_No=$r['admno'];
							//echo $Height=$r['Height'];
							//echo  $Weight=$r['Weight'];
							//echo    $health=$r['health'];
							//echo	 $remarks=$r['remarks'];
							   $mname=$r['mname'];
							    $dob=$r['dob'];
								$pid=$r['id'];
						
						$mp=mysqli_query($link,"select * from photo where id1='$pid'");
						$nm=mysqli_fetch_array($mp);
						$photo=$nm['location'];
						?>

	 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="float:center; ">
         <div align="center">
		 <div style="height:70;"></div>
		  <?php
		if($test=="Summative Assessment1"){ ?>
		
		
	  <p align="center"><h2>Performance Profile<br/>Term I:Academic Year <?php 
	   $acd_year; 
	  
							  $ss="select * from acyear where id='$acd_year'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							 echo  $year=$re['year'];
							
	   
	   ?></h2></p>
	
	<?php	
		}else if($test=="Summative Assessment2"){?>
			
			
	  <p colspan="4" align="center"><h2>Performance Profile<br/>Term II:Academic Year <?php 
	   $acd_year; 
	  
							  $ss="select * from acyear where id='$acd_year'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							 echo  $year=$re['year'];
							
	   
	   ?></h2></p>
	 
			
			<?php	
		}else if($test=="Summative Assessment3"){?>
			
			
	  <p colspan="4" align="center"><h2>Performance Profile<br/>Term III:Academic Year <?php 
	   $acd_year; 
	  
							  $ss="select * from acyear where id='$acd_year'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							 echo  $year=$re['year'];
							
	   
	   ?></h2></p>
			
			<?php
		}?>
		
		
			
		 </div>
<div >
    
	
      <table  width="800" align="center" > 
	  <tr style="height:20px;"></tr>
	 
	  <tr>
	  <td><b>Name of the Student</b></td>
	  <td><b><?php echo $name ?></b></td>
	   <td><b>Roll No</b></td>
	  <td><?php echo $rnum ?></td>
	  
	 <td colspan="2" rowspan="4"> <img src="<?php echo $photo; ?>" height="120"/></td>
	  </tr>
	  <tr>
	  <td><b>Father's Name</b></td>
	  <td><?php echo $fname ?></td>
	  <td><b>Adm No</b></td>
	  <td><?php echo $Admission_No ?></td>
	  </tr>
	    <tr>
	  <td><b>Mother's Name</b></td>
	  <td><?php echo $mname ?></td>
	  <td><b>Class</b></td>
	  <td><?php echo $Class ?></td>
	  </tr>
	  <tr>
	  <td><b>Date of Birth</b></td>
	  <td><?php echo $dob ?></td>
	   <td><b>Medium</b></td>
	  <td><?php echo $med ?></td>
	  </tr>
	 
	  
	   
	  
	
	   </table>
       
       <hr>
	 
	 
     <?php
	 $gr=mysqli_query($link,"select * from ex2");
	 while($gr1=mysqli_fetch_array($gr)){
		 
	 
	 $grade=$gr1['grade'];
	 $from=$gr1['from'];
	 $to=$gr1['to']; }
	
	 ?>
     
     <p align="center"><b>CURRICULAR AREAS</b></p>
  <table border="1" align="center" width="708" cellpadding="0" cellspacing="0">
  
  <tr><td align="center"><b>SUBJECT</b></td><td align="center" style="text-transform: uppercase;"><b><?php echo $tes=$_GET['id1'];?></b><br/>(100)</b></td>
     <td align="center"><b>Grade</b></td><td align="center"><b>GPA</b></td>       </tr>
	  <?php
    $i=$_REQUEST['id'];
			 $tes=$_GET['id1'];
   
	 	//echo $id=$_GET['id'];
		 $i=$_REQUEST['id'];
			 $tes=$_GET['id1'];
			 $ck2=mysqli_query($link,"select subject from addsub where class='$Class' order by id ");
			 while($ck3=mysqli_fetch_array($ck2)){
				 $subject1=$ck3['subject'];
			    $mn="select * from marks_entry where Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' and sub='$subject1'";
	 $sq1=mysqli_query($link,$mn) or die(mysqli_error());
	
		//$cs=0;
	  $cn=mysqli_num_rows($sq1);
	 while($resu1=mysqli_fetch_array($sq1)){
	 		  $rno=$resu1['roll_number'];
		 $sub2=$resu1['sub'];
		  $mrk=$resu1['marks'];
		 $max_marks=$resu1['max_marks'];
		 $max=$resu1['max_marks'];
		 $m=$max_marks+$m;
		 
		
		
		 
		 	 
		 
		 
		
		
		
		
		  
		  
		
		 
		
		 
		 

		 
		 if($sub2=="Hindi/Urdu"){  $sub2=$flang;}{ $sub2;}
		 
		 
		 $fmr=($mark12+$mark123)/2;
		
		
		  $tm1=$mrk+$fmr;
		 $tm=round($tm1);
		  
		
		 
		 
		 
		 
		 
		 
		 
		if($sub2=="Telugu"){
		 if(($tm >= 91) && ($tm <= 100))
		
		{
			$a='A1';
			$a1='10';
		}
			else if(($tm >=80)&& ($tm <= 90)){
		$a='A2';
		$a1='9';
	}

	else if(($tm >= 68)&& ($tm <= 79)){

		$a='B1';
		$a1='8';
	}
	else if(($tm >= 56)&& ($tm <= 67)){
	
		$a='B2';
		$a1='7';
	}
	else if(($tm >=44)&& ($tm <= 55)){

		$a='C1';
		$a1='6';
	}
	else if(($tm >=32)&& ($tm <= 43)){
	
		$a='C2';
		$a1='5';
	}
	else if(($tm >=20)&& ($tm <= 31)){
	
		$a='D';
		$a1='4';
	}
	
		else if(($tm >=0)&& ($tm <= 19)){
		$a='E';
		$a1='3';
	}
	}else{
	
	
	if(($tm >= 91) && ($tm <= 100))
		
		{
			$a='A1';
			$a1='10';
		}
			else if(($tm >=81)&& ($tm <= 90)){
		$a='A2';
		$a1='9';
	}

	else if(($tm >= 71)&& ($tm <= 80)){

		$a='B1';
		$a1='8';
	}
	else if(($tm >= 61)&& ($tm <= 70)){
	
		$a='B2';
		$a1='7';
	}
	else if(($tm >=51)&& ($tm <= 60)){

		$a='C1';
		$a1='6';
	}
	else if(($tm >=41)&& ($tm <= 50)){
	
		$a='C2';
		$a1='5';
	}
	else if(($tm >=35)&& ($tm <= 40)){
	
		$a='D';
		$a1='4';
	}
	
		else if(($tm >=0)&& ($tm <= 34)){
		$a='E';
		$a1='3';
	}
	
	}
	?>
         
		 
		 
	   
		 
		
 <tr ><td style="padding-left:20px;" width="120"><?php echo $sub2?> </td>
          <td align="center"><?php echo $mrk; ?></td> 
         
		  
           <td align="center"><?php echo $a?></td>
           <td align="center"><?php echo $a1?> <?php  $gpa=$gpa+$a1; ?><?php  $cs1=$cs1+1; ?> </td></tr>
           
           <?php } }?>
        
</table>
       
	 <div style="width:100%;float:left; margin-top:10px;" align="center"> 
	 <div style="width:45%;float:left;">
	 <table border="1" align="center" width="220"  cellpadding="0" cellspacing="0">
	 <tr>
	 <th colspan="2">Attendance</th>
	 
	 </tr>
	 <?php 
	 
	  $pq1="select  distinct (date2) from attendence where class1='$Class'  and  sect1='$Section' and  med1='$med' and   acdyear='$acd_year'";
	 $rs1=mysqli_query($link,$pq1) or die(mysql_error());
	 $pcount1=mysqli_num_rows($rs1);
	 
	 
	  $pq="select * from attendence where class1='$Class'  and  sect1='$Section' and  med1='$med' and  rnum='$id' and  acdyear='$acd_year' and atten<>''";
	 $rs=mysqli_query($link,$pq) or die(mysql_error());
	 $pcount=mysqli_num_rows($rs);
	 
	 
	 ?>
	 
	 
	 <tr>
	 <td style="padding-left:20px;" width="150" >No of Working Days</td>
	 <td style="padding-left:20px;"><?php  echo $pcount1 ?></td>
	
	 </tr>
	 <tr>
	 <td style="padding-left:20px;" width="150" >No of Days Present</td>
	 
	 
	 
	 <td style="padding-left:20px;" ><?php  echo $pcount ?></td>
	
	 </tr>
	 <tr>
	 <td style="padding-left:20px;" width="150" >Percentage</td>
	 <td style="padding-left:20px;" ><?php echo ($pcount*100)/$pcount1;  ?></td>
	
	 </tr>
	 </table>
	 
	 </div>
	 <div style="width:50%;float:left;">
	 <?php 
	 
	
	 
	 
 $qu="select * from height where Class='$Class' and Section='$Section' and Medium='$Medium' and roll_number='$id'  and acd_year='$acd_year'";
$rs4=mysqli_query($link,$qu) or die(mysql_error());
$rp=mysqli_fetch_array($rs4);
$Height=$rp['Height'];
$Weight=$rp['Weight'];
//$remarks=$rp['remarks'];
$health=$rp['health'];


	 ?>
	 <table border="1" align="center" width="420"  cellpadding="0" cellspacing="0">
	 <tr>
	 
	 <th colspan="2">Health Status</th>
	 </tr>
	 <tr>
	
	 <td style="padding-left:20px;" width="120" >Height</td>
	 <td align="center"><?php echo $Height."  cms"; ?></td>
	 </tr>
	 <tr>
	 
	 <td style="padding-left:20px;" width="120">Weight</td>
	 <td align="center"><?php echo $Weight."  kgs"; ?></td>
	 </tr>
	 <tr>
	
	 <td style="padding-left:20px;" width="120">Health Issue</td>
	 <td align="center"><?php echo $health; ?></td>
	 </tr>
	 </table>
	 
	 </div>
	 <br>
	 </div>
	
	<table height="10"><tr><td>&nbsp;;</td></tr></table>
	
     
      <table width="608">
	  <?php 
	 $qup="select * from remarks where class='$Class' and section='$Section' and medium='$Medium' and rollno='$id'  and acdyear='$acd_year' and test='$test'";
$rs41=mysqli_query($link,$qup) or die(mysql_error());
$rp1=mysqli_fetch_array($rs41);
$remarks1=$rp1['remarks'];
	 ?>
	 <tr><td>Remarks :<?php echo $remarks1 ?></td></tr>
	<tr height="40"></tr>
	 <tr>
	 <td>
	 Class Teacher &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 Principal</td>
	 </tr></table>
     
     
    <table align="center" >
     <tr><td height="20px"></td></tr><tr>
    <td></td><td align="center"><input type="button" value="Print" id="prt" class="butbg" onClick="printt()"/></td><td><input type="button" value="Close" id="cls" class="butbg"  onclick="javascript:location.href='grade_wise.php'"/></td>
</tr></table>
  
     </fieldset><table>
	
	
    <?php
//include("config.php");


 /*$id=$_GET['id'];
						 $id2=$_GET['id1'];
						 $Class=$_GET['id3'];
						 $Section=$_GET['id4'];
						 $Medium=$_GET['id5'];
					 $acd_year=$_GET['id6'];
  $class=$_POST['class'];
  $roll=$_POST['roll'];
  $year=$_POST['year'];*/
  
 

  
if($tes=='Summative Assessment1'){
  
   $p="select * from marks_entry where Class='$Class' and acd_year='$acd_year' and roll_number='$id' and test='Summative Assessment1'";
$sq=mysqli_query($link,$p) or die(mysql_error());
 $scount=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['frist_name1'];
$test=$re['test'];
$sub=$re['sub'];
  $marks=$re['marks'];
$max_marks=$re['max_marks'];
$frist_name1=$re['frist_name1'];
  $tot10=$marks+$tot10."<br/>";
    $max20=$max_marks+$max20;
}
   $tot10;
    $max20;
 
   $k='1';
   $ttt=$scount-$k;
    $ttt;
   $maximumPoints  = $ttt*20;


   $percentage8 = round(($tot10/$max20*100));
   
 //$maximumPoints  = $max20;}
 } else {
   //round(($tot)*100/$maximumPoints);
  $percentage8=0;
  }
  
 
  if($tes=='Summative Assessment2'){
   $p="select * from marks_entry where Class='$Class' and acd_year='$acd_year' and roll_number='$id' and test='Summative Assessment2'";
$sq=mysqli_query($link,$p) or die(mysql_error());
 $scount=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['frist_name1'];
$test=$re['test'];
$sub=$re['sub'];
  $marks=$re['marks'];
$max_marks=$re['max_marks'];
$frist_name1=$re['frist_name1'];
 $tot20=$marks+$tot20."<br/>";
   $max30=$max_marks+$max30;
}
   $tot10;
    $max20;
 
   $k='1';
   $ttt=$scount-$k;
    $ttt;
   $maximumPoints  = $ttt*20;
  
   
   
   
   
 //$maximumPoints  = $max20;
  $percentage7 = round(($tot20/$max30*100));
  

  } else {
   //round(($tot)*100/$maximumPoints);
  $percentage7=0;
  }
 
  if($tes=='Summative Assessment3'){
    $p="select * from marks_entry where Class='$Class' and acd_year='$acd_year' and roll_number='$id' and test='Summative Assessment3'";
$sq=mysqli_query($link,$p) or die(mysql_error());
 $scount=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['frist_name1'];
$test=$re['test'];
$sub=$re['sub'];
  $marks=$re['marks'];
 $max_marks1=$re['max_marks'];
$frist_name1=$re['frist_name1'];
 $tot30=$marks+$tot30."<br/>";
   $max40=$max_marks1+$max40;
}
  
   
   
   
   
   
 //$maximumPoints  = $max20;
   $percentage6 = round(($tot30/$max40*100));
  } else {
	  
   $percentage6=0;
  }
  
  
 
 
 
   
	  
	 // $percentage3 = round($tm1/$kk);
	  
   
   include("KoolChart/koolchart.php");

	$chart = new KoolChart("chart");
	$chart->scriptFolder=$KoolControlsFolder."KoolChart";	
	$chart->Title->Text = "Marks Report-Roll Num- $id --Class- $Class";
	$chart->Width = 820;
	$chart->Height = 450;
	//$chart->BackgroundColor = "#ffffee";
	$chart->PlotArea->XAxis->Title = "";
	$chart->PlotArea->XAxis->Set(array("SA-1","SA-2","SA-3"));
	$chart->PlotArea->YAxis->Title = "Marks Percentage";
	$chart->PlotArea->YAxis->LabelsAppearance->DataFormatString = "{0}";
   
	$series = new ColumnSeries();
	$series->Name = "$name"."---"."Max Marks 100%";
	$series->TooltipsAppearance->DataFormatString = "{0} %";
	$series->ArrayData(array($percentage8,$percentage7,$percentage6));
	$chart->PlotArea->AddSeries($series);
    
	//$series = new ColumnSeries();
	//$series->Name = "Computers";
	//$series->TooltipsAppearance->DataFormatString = "$ {0} millions";
	//$series->ArrayData(array(34,55,10,40));
	//$chart->PlotArea->AddSeries($series);
    
	//$series = new ColumnSeries();
	//$series->Name = "Tablets & e-readers";
	//$series->TooltipsAppearance->DataFormatString = "$ {0} millions";
	//$series->ArrayData(array(56,23,56,80));
	//$chart->PlotArea->AddSeries($series);
?>

<form id="form1" method="post">

	<?php echo $chart->Render();?>					
	
</form>


		
<div align="center"> 
 <img src="images/Grades.png" width="700" height="400"/>
 </div>