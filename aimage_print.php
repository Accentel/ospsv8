<?php
$id=$_REQUEST['id'];
?>
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
<div align="center" style="margin-bottom:15px;"><input type="button" value="Print" id="prt" class="butt" onclick="printt()"/> <input type="button" value="Close" id="cls" class="butt"  onclick="window.close();"/></div>
<img src="uploads/ap/<?php echo $id ?>"/>