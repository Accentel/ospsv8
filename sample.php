<div id="inline">
 <h2>Send us a Message</h2>
 <form id="contact" name="contact" action="#" method="post">
 <label for="email">Your E-mail</label>
 <input type="email" id="email" name="email" class="txt">
 <br>
 <label for="msg">Enter a Message</label>
 <textarea id="msg" name="msg" class="txtarea"></textarea>
<button id="send">Send E-mail</button>
 </form>
</div>
<script type="text/javascript">
 $(document).ready(function() {
$(".modalbox").fancybox();
$("#contact").submit(function() { return false; });
$("#send").on("click", function(){
var emailval = $("#email").val();
var msgval = $("#msg").val();
var msglen = msgval.length;
var mailvalid = validateEmail(emailval);
if(mailvalid == false) {
$("#email").addClass("error");
}
else if(mailvalid == true){
 $("#email").removeClass("error");
 }

 if(msglen < 4) {
 $("#msg").addClass("error");
 }
 else if(msglen >= 4){
 $("#msg").removeClass("error");
 }

 if(mailvalid == true && msglen >= 4) {
 // if both validate we attempt to send the e-mail
 // first we hide the submit btn so the user doesnt click twice
 $("#send").replaceWith("<em>sending...</em>");
 //This will post it to the php page
 $.ajax({
 type: 'POST',
 url: 'sendmessage.php',
 data: $("#contact").serialize(),
 success: function(data) {
 if(data == "true") {
 $("#contact").fadeOut("fast", function(){
//Display a message on successful posting for 1 sec
 $(this).before("<p><strong>Success! Your feedback has been sent, thanks :)</strong></p>");
 setTimeout("$.fancybox.close()", 1000);
 });
 }
 }
 });
 }
 });
 });
</script>