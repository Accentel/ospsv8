 <html>
 <head></head>
 <title>Radiant High School</title>
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
function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }

    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}
?>
                               
                               
                                <?php
							
//include('org2.php');
						 $id=$_GET['id'];
						 $id2=$_GET['id1'];
						 $Class=$_GET['id3'];
						 $Section=$_GET['id4'];
						 $Medium=$_GET['id5'];
						 $acd_year=$_GET['id6'];
						
						
						$sq=mysqli_query($link,"select distinct test,sub,roll_number,frist_name1,Medium,marks,max_marks,Class,Section,test from marks_entry where Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' ");
						while($re=mysqli_fetch_array($sq)){
							$test=$re['test'];
							$sub=$re['sub'];
							$rnum=$re['roll_number'];
							$name=$re['frist_name1'];
							$med=$re['Medium']; 
							$marks=$re['marks'];
						    $maxmarks = $re['max_marks'];
							$Class=$re['Class'];
							$Section=$re['Section'];
							$test=$re['test'];	 	
						}
						?>
                       
                       
                        
                           <?php

$sql="select * from organization";
$res=mysqli_query($link,$sql) or die(mysql_error());
while($row=mysqli_fetch_array($res)){
	$orgname=$row['org_name'];
	$oaddr=$row['org_address'];
	$phone=$row['phone'];
	
	
}
?>


 <?php
						$sql=mysqli_query($link,"select a.fname,a.Roll_Number,b.roll_number  from stu_admision a,marks_entry b where a.Roll_Number='$rnum'");
						$r=mysqli_fetch_array($sql);
							 $fname=$r['fname'];
							 $roll=$r['Roll_Number'];
						  $fat=$r['fname'];
						
						
						?>

		
  <?php
   
			 
    $sq1=mysqli_query($link,"select sum(marks) as marks1,sum(max_marks) as mak from marks_entry where  Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' ");
	 while($resu=mysql_fetch_array($sq1)){
		// $sub1=$resu['sub'];
		 $tot=$resu['marks1'];
		 $mx=$resu['mak'];
	 }?>
     
     <?php
	 	//echo $id=$_GET['id'];
		 
	 $sq=mysqli_query($link,"select * from marks_entry where  Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' ");
	 while($resu=mysqli_fetch_array($sq)){
		 $sub1=$resu['sub'];
		 $mrk=$resu['marks'];
         $test5 = convertNumber($mrk);?>
         <?php 
         $test1 = convertNumber($tot);?>

       <?php } ?>
       
     
 
     
     


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
    <body style="float:center; margin-left:200px;">
         
<div style="width:850px; height:550px; padding:8px; border: 1px solid #787878; float:center;">
    <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:45px; font-weight:bold"><table width="100%" align="center">
<tr>
            <th style="font-size:20px;font-family:Arial;"><?php echo $orgname ?></th>
			</tr>
			<tr>
            <th style="font-size:16px;font-family:Arial;"><?php echo $oaddr ?></th>
			</tr>
			<tr>
            <th style="font-size:16px;font-family:Arial;">Phone : <?php echo $phone ?></th>
			</tr>
</table></span>
      	
       <hr>
       <table width="100%" align="center"  style="text-align:left;"><tr><td align="left">
       <span style="font-size:20px"><i> <strong>Roll Number  :</strong></i> </span></td><td>  <?php echo $rnum?></span></td>
       <td>&nbsp;&nbsp;&nbsp;</td>
       <td align="left">
       <span style="font-size:20px"><i> <strong>Student Name  :</strong></i> </span></td><td>  <?php echo $name?></span><br/></td></tr>
       <tr><td align="left">
       <span style="font-size:20px"><i> <strong>Class:</strong></i></span></td><td>
	   
	   <?php $ss=mysqli_query($link,"select * from class where id='$Class'");
	   $r=mysqli_fetch_array($ss);
	   echo $cl=$r['cname'];
	   ?></span> </td>
          <td>&nbsp;&nbsp;&nbsp;</td>
       <td align="left">
       <span style="font-size:20px"><i><strong> Section:</strong></i> </span></td><td> <?php echo $Section?> </span><br /></td></tr><tr><td align="left">
	   
	     <span style="font-size:20px"><i> <strong>Medium:</strong></i></span></td><td>    <?php echo $med?></span></td>  
          <td></td><td align="left">
	   

       <span style="font-size:20px"><i><strong> Test Name: </strong> </i> </span></td><td> <?php echo $test?></span></td></tr></table>
         
       <hr>
       
       <table style="width:100%; text-align:center">
  <tr>
    <th>SUBJECT</th>
    <th>CHILDRENS(5)</th>
    <th>WRITTEN(5)</th>
    <th>PROJECT(5)</th>
    <th>SLIP TEST(5)</th>
    <th>TOTAL(20)</th>
    <th>GRADE</th>
   <!-- <th>MAXIMUM MARKS</th>		
    <th>MARKS  IN FIGURES</th>
    <th>MARKS (IN WORDS)</th>-->		
    
  </tr><?php
  $sq=mysqli_query($link,"select distinct test,sub,roll_number,frist_name1,Medium,marks,max_marks,Class,Section,test from marks_entry where Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' ");
						while($re=mysqli_fetch_array($sq)){
							$test=$re['test'];
							$sub=$re['sub'];
							$rnum=$re['roll_number'];
							$name=$re['frist_name1'];
							$med=$re['Medium']; 
							$marks=$re['marks'];
						    $maxmarks = $re['max_marks'];
							$Class=$re['Class'];
							$Section=$re['Section'];
							$test=$re['test'];	 	
						}
						?>
  
  
 <?php
   
			 
    $sq1=mysqli_query($link,"select sum(marks) as marks1,sum(max_marks) as mak from marks_entry where  Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' ");
	 while($resu=mysqli_fetch_array($sq1)){
		// $sub1=$resu['sub'];
		 $tot=$resu['marks1'];
		  $mx=$resu['mak'];
	 }?>
     
     <?php
	 	//echo $id=$_GET['id'];
		 
	 $sq=mysqli_query($link,"select * from marks_entry where  Class='$Class' and Section='$Section' and Medium='$Medium' and  test='$id2' and acd_year='$acd_year' and roll_number='$id' ");
	$n=mysqli_num_rows($sq);
	 while($resu=mysqli_fetch_array($sq)){
		 $sub1=$resu['sub'];
		 $mrk=$resu['marks'];
         $test5 = convertNumber($mrk);?>
         <?php 
         $test1 = convertNumber($tot);?>
     <tr>
     <td>   <?php echo $resu['sub'];?> </td>
     <td>   <?php echo $c=$resu['child_dress'];?> </td> 
     <td>   <?php echo $w=$resu['written_work'];?> </td> 
     <td>  <?php echo $p=$resu['project_work'];?> </td> 
     <td>  <?php echo $s=$resu['slip_test1'];?> </td> 
     <td>  <?php echo $m=$resu['marks'];?> </td> 
     <td>   <?php echo $resu['grade1'];?> </td> 
    <?php /*?> <td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	 <?php echo $maxmarks?></td>
     <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $mrk?></td>
     <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $test5?></td>
    <?php */?> </TR>
   
    
    
       <?php
	   $c1=$c+$c1;
	   $w1=$w+$w1;
	   $p1=$p+$p1;
	   $s1=$s+$s1;
	   $m1=$m+$m1;
	    } ?>
        <tr><td colspan="7">  <hr /></td></tr>
       
       <tr><td><strong>GRAND TOTAL</strong></td>
    <td><strong><?php echo $c1;?></strong></td>
    <td><strong><?php echo $w1;?></strong></td>
    <td><strong><?php echo $p1;?></strong></td>
    <td><strong><?php echo $s1;?></strong></td>
    <td><strong><?php echo $m1;?></strong></td>
    <?php  $tt1=$m1/4;   $ttx=($tt1/$n);
	 $tty=round($ttx,2);
	 $tt=round($tty);
	
    if($tt>=4.6 && $tt<=5){
	   
	  $gr="A1";
   } else if($tt>=4.1 && $tt<=4.5) {
	  
	   $gr="A2";
   }
   else if($tt>=3.6 && $tt<=4.0) {
	  
	   $gr="B1";
		
		
   }
  else if($tt>=3.1 && $tt<=3.5) {
	  
	   $gr="B2";
		
		
   }else if($tt>=2.6 && $tt<=3.0) {
	  
	    $gr="C1";
   }else if($tt>=2.1 && $tt<=2.5) {
	  
	    $gr="D";
   }else if($tt<=1.5 && $tt<=2.0) {
	  
	    $gr="E";
   }?>
     <td><strong><?php echo $gr;?></strong></td>
       
    <!-- <tr><td>  <hr /></td><td>  <hr /></td><td>  <hr /></td><td>  <hr /></td></tr>
       <tr><td><strong>Grand Total</strong></td><td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mx?></strong></td><td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tot?></strong></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $test1?></td></tr>
--></table>     
<hr>
       
      
       <span style="font-size:20px"><strong><i>Total marks:</i></strong>&nbsp;&nbsp;&nbsp; <?php echo $tot?>/<?php echo $mx?></i></span><br>
	   
	   
	  
         
         
   
   
       
      
	   
	   
	   
       <span style="font-size:20px"><strong ><i>Total Grade</i>:</strong> &nbsp;&nbsp;&nbsp; <?php   $n; $tt=round((($tot/($mx)*10)/$n));
	     echo "$gr";
	   
	   
	   ?></span>
    
</div>
    <table align="center">
     <tr><td height="20px"></td></tr><tr>
    <td></td><td align="center"><input type="button" value="Print" id="prt" class="butt" onclick="printt()"/></td><td><input type="button" value="Close" id="cls" class="butt"  onclick="javascript:location.href='marks_entry_view.php'"/></td>
</tr></table>
    </body>
</html>


		