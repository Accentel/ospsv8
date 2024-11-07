 <?php
 include('dbconnection/connection.php');
 ?>
 <h2>Import Excel File into MySQL Database using PHP</h2>
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         

<?php
//$conn = mysqli_connect("ospsbilling.com","root","test","phpsamples");
require_once('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('spreadsheet-reader-master/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $uid = "";
                if(isset($Row[0])) {
                    $uid = mysqli_real_escape_string($link,$Row[0]);
                }
                
                $line = "";
                if(isset($Row[0])) {
                    $line = mysqli_real_escape_string($link,$Row[0]);
                }
                 $itemdesc = "";
                if(isset($Row[1])) {
                    $itemdesc = mysqli_real_escape_string($link,$Row[1]);
                }
                
                $qty = "";
                if(isset($Row[2])) {
                    $qty = mysqli_real_escape_string($link,$Row[2]);
                }
                 $amount = "";
                if(isset($Row[4])) {
                    $name = mysqli_real_escape_string($link,$Row[4]);
                }
                
                $id1 = "";
                if(isset($Row[5])) {
                    $description = mysqli_real_escape_string($link,$Row[5]);
                }
                 
                
                if (!empty($name) || !empty($description)) {
                    $query = "insert into ubill1(line,itemdesc,uom) values('".$line."','".$itemdesc."','".$qty."')";
                   echo  $result = mysqli_query($link, $query);
                   echo $itemdesc;
                
                    if (! empty($result)) {
                        $type = "success";
                    
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>