<?php
$k=4;
 include("header.php");?>
 
 <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Doctor Appointment</h3>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Breadcumb Area End ***** -->

    <section class="medilife-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12 col-lg-12">
                    <div class="contact-form">
                        <h5 class="mb-50">Doctor Appointment</h5>

                        <form class="" action="" method="post" enctype="multipart/form-data">
   
     <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Patient Name:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" required id="pname"  name="pname">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Mobile No:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" required id="mno"  name="mno">
      </div>
    </div>
    
    
    
     <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email Id:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" required id="email"  name="email">
      </div>
    </div>
    
    
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Age:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" id="age"  name="age">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Gender:</label>
      <div class="col-sm-9">          
        <input type="radio"  id="sex"  name="sex" value="male">Male &nbsp;&nbsp;<input type="radio"  id="sex"  name="sex" value="female">Female
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-6" for="add">Address:</label>
      <div class="col-sm-9">          
        <textarea class="form-control input-sm" id="address"  name="address"></textarea>
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-3" requried for="pwd">Consult Doctor:</label>
      <div class="col-sm-9">          
        <select name="dname" id="dname" class="form-control"  onchange="showUser(this.value)" >
            <option  value="">Select Doctor</option>
            <?php 
            $yt=mysqli_query($link,"select * from doctor") or die(mysqli_error($link));
            while($pp=mysqli_fetch_array($yt)){
            
            ?>
            <option  value="<?php echo $pp['name']; ?>"><?php echo $pp['name']; ?></option>
            
            <?php } ?>
            
        </select>
      </div>
    </div>
    <br/>
    <br/>
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd">Available on:</label>
      <div class="col-sm-9">          
        <input type="text" class="form-control input-sm" id="available"  name="available">
      </div>
    </div>
    
  <div class="form-group">
      <label class="control-label col-sm-9" for="pwd">Appointment Date:</label>
      <div class="col-sm-6">          
        <input type="date" class="form-control input-sm" required id="apt_date" onChange="(getappointment(this.value))"  name="apt_date">
        </div>
      </div>
       <div class="form-group">
      <label class="control-label col-sm-9" >Appointment Time:</label>
      
    </div>
    <div  id="slots" >          
       
      </div>
  
    <div class="form-group">        
      <div class="col-sm-6" >
          <label class="control-label col-sm-9" ></label>
        <button type="submit" name="submit" class="btn medilife-appoint-btn ">Submit</button>
      </div>
    </div>
  </form>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
	
	<?php if(isset($_POST['submit'])){
		$pname=$_POST['pname'];
		$mno=$_POST['mno'];
		$age=$_POST['age'];
		$sex=$_POST['sex'];
		$email=$_POST['email'];
		$dname=$_POST['dname'];
		$address=$_POST['address'];
		$apt_date=$_POST['apt_date'];
		$apt_time=$_POST['timeslot'];
		$sq=mysqli_query($link,"insert into appointment(name,mobile,gender,age,email,consult_doct,addr,appint_date,appint_time)
		values('$pname','$mno','$sex','$age','$email','$dname','$address','$apt_date','$apt_time')");
	
		$tt =$email;
 $from_email="info@majestichospital.com";
 

	  $to = "$tt".",";
	  $to.=$frmail;
	$subject = "Majestic Hospital Doctor Appointment";
	
   /*$header = "From:$frmail \r\n";
   $header .= "TO:$to \r\n";

   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html\r\n";*/
   $headers = "From:".$from_email."\r\n".
        "Reply-To: ".$from_email. "\n" .
        "X-Mailer: PHP/" . phpversion();
        
   $message = '<html><body>';
			$message .= '<img src="http://majestichospital.com/raj logo1.png" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>$pname</td></tr>";
			$message .= "<tr><td><strong>Age:</strong> </td><td>$age</td></tr>";
	    	$message .= "<tr><td><strong>Mobile:</strong> </td><td>$mno</td></tr>";
	    	$message .= "<tr><td><strong>Gender:</strong> </td><td>$sex</td></tr>";
	    	$message .= "<tr><td><strong>Address:</strong> </td><td>$address</td></tr>";
	    	$message .= "<tr><td><strong>Doctor:</strong> </td><td>$dname</td></tr>";
	    	$message .= "<tr><td><strong>date & Time:</strong> </td><td>$apt_date.$apt_time</td></tr>";
	    	$message .= "</table>";
			$message .= "</body>
</html>";


  // $retval = mail ($to,$subject,$message,$header);
  $body = $message;
 $retval= mail($tt, $subject, $body, $headers);
		if($retval){print "<script>";
			print "alert('Registerd Sucessfully ');";	
			print "self.location='home.php';";
			print "</script>";
		}
	}?>


    <!-- ***** CTA Area Start ***** -->
    <div class="medilife-cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content">
                        <i class="icon-smartphone"></i>
                        <h2>For Emergency calls</h2>
                        <h3>+91-8341694595</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>   
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script type="text/javascript">
    
function getappointment(str)
{
var apt_date=document.getElementById("apt_date").value;
var gsDayNames = [
  'Sunday',
  'Monday',
  'Tuesday',
  'Wednesday',
  'Thursday',
  'Friday',
  'Saturday'
];

var d = new Date(apt_date);
var dayName = gsDayNames[d.getDay()];
var doctorid = document.getElementById("dname").value;
//alert(dayName);
/*if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }*/
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var finaloutput=show.split("$");
	var strar=finaloutput[0].split(",");
	var strar1=finaloutput[1].split("%");
	//alert(strar[0]);
	var div = document.getElementById('slots');
	div.innerHTML='';
	var data="<div data-role='fieldcontain'><fieldset data-role='controlgroup'>";
for(var i=0;i<strar.length;i+=2)
{
var start = moment(strar[i], 'hh:mm:ss');
    var end = moment(strar[i+1], 'hh:mm:ss');

    // round starting minutes up to nearest 15 (12 --> 15, 17 --> 30)
    // note that 59 will round up to 60, and moment.js handles that correctly
    start.minutes(Math.ceil(start.minutes() / 15) * 15);

    var result = [];

    var current = moment(start);
    while (current <= end) {
        result.push(current.format('HH:mm:ss'));
        if(jQuery.inArray(current.format('HH:mm:ss'), strar1)==-1)
   // data +="<td><input style='margin:10px; float:left ' type='radio' name='timeslot' value="+current.format('HH:mm:ss')+" ><p style='margin:10px; padding:5px;color:green;border:2px solid blue;float:left ' >"+current.format('HH:mm:ss')+"</p></input></td>";
    data+="<label class='radio-inline'><input  type='radio' name='timeslot' value="+current.format('HH:mm:ss')+" /><p style='margin:10px; padding:5px;color:green;border:2px solid blue;' >"+current.format('HH:mm:ss')+"</p></label>";
else
data+="<label class='radio-inline'><input disabled=true  type='radio' name='timeslot' value="+current.format('HH:mm:ss')+" /><p style='margin:10px; padding:5px;color:red;border:2px solid red; ' >"+current.format('HH:mm:ss')+"</p></label>";
   current.add(15, 'minutes');
    }
    
/*	document.getElementById("token1").value=strar[1];
	document.getElementById("con_fee").value=strar[2];*/
	}
	data+='</fieldset></div>';
    div.innerHTML += data;
    }
  }
  
xmlhttp.open("GET","getappointmentslots.php?doctorname="+doctorid+'&weekday='+dayName+'&date='+apt_date,true);
xmlhttp.send();
}
</script>
    
	<?php include("footer.php");?>