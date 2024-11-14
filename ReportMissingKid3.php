
<?php
   session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

	$Mobile=$_SESSION['Mobile'];
	$Station=$_SESSION['VStation'];
	$District=$_SESSION['VDistrict'];
	
include_once "DB/db.php";
	
	$sql = "SELECT Code FROM tblpolicestation where PoliceStation='$Station' and District='$District'";
			  
	$result=execute($sql);	
	if ($result->num_rows > 0) 
	{
		if($row = $result->fetch_assoc()) 
  		{
			$Code= $row['Code'];
		}
	}

  include("MasterPages/Header.php");
  ?>
  
  <?php
if(isset($_REQUEST['btnReport']))
{
	$KidName=$_POST['txtKidName'];
	$ParentName=$_POST['txtParentName'];
	$Address=$_POST['txtAddress'];
	$Mobile=$_POST['txtMobile'];
	$Sex=$_POST['cmbSex'];
	$DOB=$_POST['txtDOB'];
	$Height=$_POST['txtHeight'];
	$Weight=$_POST['txtWeight'];
	$DateofDisappear=$_POST['txtDateofDisappear'];
	$PlaceofDisappear=$_POST['txtPlaceofDisappear'];
	$IdentificationMarks=$_POST['txtIdentificationMarks'];
	$Station=$_POST['txtStation'];
	
	$DOB=date("Y-m-d", strtotime($DOB));
	$DateofDisappear=date("Y-m-d", strtotime($DateofDisappear));
	
	
	$MissingKidImage=$_FILES['MissingKidImage']['name'];
	$MissingKidImagePath = "MissingKidImage/$MissingKidImage";
	$file_tmp_name=$_FILES['MissingKidImage']['tmp_name'];
	
	move_uploaded_file($file_tmp_name, $MissingKidImagePath);
			
	$insert="INSERT INTO `tblmissingklds`(`KidName`, `ParentName`, `Address`, `Mobile`, `Sex`, `DOB`, `Height`, `Weight`, `DateofDisappear`, `PlaceofDisappear`, `IdentificationMarks`, `Station`, `KidPic`, `Status`) VALUES ('$KidName','$ParentName','$Address','$Mobile','$Sex','$DOB','$Height','$Weight','$DateofDisappear','$PlaceofDisappear','$IdentificationMarks','$Station','$MissingKidImagePath','New')";
		$res=execute($insert);
		
		$sql = "SELECT * FROM tblpolicestation";
		$result=execute($sql);	
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$Mobile=$Mobile.$row['Mobile'].",";
			}
		}
		
		$mobileno=$Mobile;
		$str="A Missing People is reported Please check portal for more information";
		echo "<script type='text/javascript'>
window.open('http://s.exonics.co.in/api/sendmsg.php?user=chetanpuc&pass=chetan123456&sender=CHETAN&phone=$mobileno&text=$str Message&priority=ndnd&stype=normal');</script>";

		echo "<script type='text/javascript'> alert('Inserted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=MissingKidsList.php'>";
}
?>


  
   <h3>Report Missing Peoples</h3>



    <form id="frmadd" name="frmadd" method="post" action="" enctype="multipart/form-data">
           	<table id="bigtable">
            	<tr>
                	<td style="width:38%;">Peoples Name</td>
					<td><input type="text" name="txtKidName" maxlength="100"/></td>
                </tr>
				
       			<tr>
                	<td style="width:38%;">Parent Name</td>
					<td><input type="text" name="txtParentName" maxlength="100"/></td>
                </tr>
				
				 <tr>
            	<td>Address</td>
                <td><textarea type="text" name="txtAddress" style="height:100px"></textarea></td>
           		 </tr>
				 
				   <tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" value="<?php echo $Mobile; ?>" readonly="readonly"/></td>
                </tr>
				
				
				   <tr>
                	<td>Sex</td>
					<td>
					<select name="cmbSex">
					<option value="0">Select</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					</select>
					</td>
                </tr>
				
				 <tr>
            	<td>DOB</td>
                <td><input type="text" name="txtDOB" id="txtDOB"/></td>
           		 </tr>
				 
				  <tr>
            	<td>Height</td>
                <td><input type="text" name="txtHeight" maxlength="50"/></td>
           		 </tr>
				 
				   <tr>
            	<td>Weight</td>
                <td><input type="text" name="txtWeight" maxlength="50"/></td>
           		 </tr>
				 
				    <tr>
            	<td>Date of Disappear</td>
                <td><input type="text" name="txtDateofDisappear" id="txtDateofDisappear"/></td>
           		 </tr>
				 
				    <tr>
            	<td>Place of Disappear</td>
                <td><input type="text" name="txtPlaceofDisappear"/></td>
           		 </tr>
				 
				  <tr>
            	<td>Identification Marks</td>
                <td><input type="text" name="txtIdentificationMarks"/></td>
           		 </tr>
				 
				  <tr>
            	<td>Station</td>
                <td><input type="text" name="txtStation" value="<?php echo $Code; ?>" readonly="readonly"/></td>
           		 </tr>
				 
				 	<tr>
                	<td>Photo</td>
					<td><input name="MAX_FILE_SIZE" value="100024000000" type="hidden"> <input name="MissingKidImage" type="file" />
					</td>
                </tr>
				 			 
				 
                <tr>
                	<td colspan="2" style="text-align:center;">
                     <input type="submit" name="btnReport" onClick="return check(frmadd)" value="Report" />
					  <button type="button" name="btnCancel" onClick="window.location.href='MissingKidsList.php'">Back</button>
                    </td>
                </tr>
                 
           </table>
           </form>


        <?php
  include("Masterpages/Footer.php");
  ?>
  
  
  <script language="javascript">
function check(f)
{
if(f.txtKidName.value.trim()=="")
	{	
		alert("This Name can not be empty");
		f.txtKidName.focus();
		return false ;
	}
	else if(f.txtParentName.value.trim()=="")
	{	
		alert("This Parent Name can not be empty");
		f.txtParentName.focus();
		return false ;
	}
	else if(f.txtAddress.value.trim()=="")
	{	
		alert("This Address field can not be empty");
		f.txtAddress.focus();
		return false ;
	}
	else if(f.cmbSex.value=="0")
	{	
		alert("Select Sex");
		f.cmbSex.focus();
		return false ;
	}
	else if(f.txtDOB.value.trim()=="")
	{	
		alert("This DOB Date field can not be empty");
		f.txtDOB.focus();
		return false ;
	}
	else if(f.txtHeight.value.trim()=="")
	{	
		alert("This Height field can not be empty");
		f.txtHeight.focus();
		return false ;
	}
	else if(f.txtWeight.value.trim()=="")
	{	
		alert("This Weight field can not be empty");
		f.txtWeight.focus();
		return false ;
	}
	else if(f.txtDateofDisappear.value.trim()=="")
	{	
		alert("This Date of Disappear field can not be empty");
		f.txtDateofDisappear.focus();
		return false ;
	}
	else if(f.txtPlaceofDisappear.value.trim()=="")
	{	
		alert("This Place of Disappear field can not be empty");
		f.txtPlaceofDisappear.focus();
		return false ;
	}
	else if(f.txtIdentificationMarks.value.trim()=="")
	{	
		alert("This Identification Marks field can not be empty");
		f.txtIdentificationMarks.focus();
		return false ;
	}
return true;

	}
 </script>
  
  
  <script src="JS/Calendar/jquery.min.js" type="text/javascript"></script>
    <script src="JS/Calendar/jquery-ui.min.js" type="text/javascript"></script>
    <link href="CSS/Calendar/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript">
        $(function () {
            $('#txtDOB').datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });
			
			$('#txtDateofDisappear').datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
	