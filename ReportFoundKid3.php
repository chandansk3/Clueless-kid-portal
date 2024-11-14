
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
	$Sex=$_POST['cmbSex'];
	$ReportedPerson=$_POST['txtReportedPerson'];
	$ReportedPersonAddress=$_POST['txtReportedPersonAddress'];
	$Mobile=$_POST['txtMobile'];
	$Age=$_POST['txtAge'];
	$FoundDate=$_POST['txtFoundDate'];
	$FoundPlace=$_POST['txtFoundPlace'];
	$District=$_POST['txtDistrict'];
	$IdentificationMarks=$_POST['txtIdentificationMarks'];
	$ContactForKid=$_POST['txtContactForKid'];
	$Station=$_POST['txtStation'];
	
	$FoundDate=date("Y-m-d", strtotime($FoundDate));
	
	
	$FoundKidImage=$_FILES['FoundKidImage']['name'];
	$FoundKidImagePath = "FoundKidImage/$FoundKidImage";
	$file_tmp_name=$_FILES['FoundKidImage']['tmp_name'];
	
	move_uploaded_file($file_tmp_name, $FoundKidImagePath);
			
	$insert="INSERT INTO `tblfoundkids`(`KidName`, `Sex`, `ReportedPerson`, `ReportedPersonAddress`, `Mobile`, `Age`, `FoundDate`, `FoundPlace`, `District`, `IdentificationMarks`, `ContactForKid`, `Station`, `KidPic`, `Status`) VALUES ('$KidName', '$Sex', '$ReportedPerson', '$ReportedPersonAddress', '$Mobile', '$Age', '$FoundDate', '$FoundPlace', '$District', '$IdentificationMarks', '$ContactForKid', '$Station', '$FoundKidImagePath', 'New')";
		$res=execute($insert);
		
		if($res)
		{
			echo "<script type='text/javascript'> alert('Inserted Successfully');</script>";
			echo "<meta http-equiv='refresh' content='0;url=FoundKidList.php'>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Action not processed');</script>";
		}
}
?>


  
   <h3>Report Found Peoples</h3>



    <form id="frmadd" name="frmadd" method="post" action="" enctype="multipart/form-data">
           	<table id="bigtable">
            	<tr>
                	<td style="width:38%;">Peoples Name</td>
					<td><input type="text" name="txtKidName" maxlength="100"/></td>
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
                	<td style="width:38%;">Reported Person</td>
					<td><input type="text" name="txtReportedPerson" maxlength="100"/></td>
                </tr>
				
				 <tr>
            	<td>Address</td>
                <td><textarea type="text" name="txtReportedPersonAddress" style="height:100px"></textarea></td>
           		 </tr>
				 
				   <tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" value="<?php echo $Mobile; ?>" readonly="readonly"/></td>
                </tr>
				
				 <tr>
            	<td>Age</td>
                <td><input type="text" name="txtAge" maxlength="2" onKeyPress="return numbersonly(event, false)"/></td>
           		 </tr>
				 
				  <tr>
            	<td>Found Date</td>
                <td><input type="text" name="txtFoundDate" id="txtFoundDate"/></td>
           		 </tr>
				 
				   <tr>
            	<td>Found Place</td>
                <td><input type="text" name="txtFoundPlace" maxlength="100"/></td>
           		 </tr>
				 
				    <tr>
            	<td>District</td>
                <td><input type="text" name="txtDistrict" readonly="readonly" value="<?php echo $District; ?>"/></td>
           		 </tr>
				 
				   <tr>
            	<td>Identification Marks</td>
                <td><input type="text" name="txtIdentificationMarks" maxlength="100"/></td>
           		 </tr>
				 
				    <tr>
            	<td>Contact for Peoples</td>
                <td><input type="text" name="txtContactForKid" maxlength="10" onKeyPress="return numbersonly(event, false)"/></td>
           		 </tr>
								 
				  <tr>
            	<td>Station</td>
                <td><input type="text" name="txtStation" value="<?php echo $Code; ?>" readonly="readonly"/></td>
           		 </tr>
				 
				 	<tr>
                	<td>Photo</td>
					<td><input name="MAX_FILE_SIZE" value="100024000000" type="hidden"> <input name="FoundKidImage" type="file" />
					</td>
                </tr>
				 			 
				 
                <tr>
                	<td colspan="2" style="text-align:center;">
                     <input type="submit" name="btnReport" onClick="return check(frmadd)" value="Report" />
					  <button type="button" name="btnCancel" onClick="window.location.href='FoundKidList.php'">Back</button>
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
	else if(f.cmbSex.value=="0")
	{	
		alert("Select Sex");
		f.cmbSex.focus();
		return false ;
	}
	else if(f.txtReportedPerson.value.trim()=="")
	{	
		alert("This Reported Person field can not be empty");
		f.txtReportedPerson.focus();
		return false ;
	}
	else if(f.txtReportedPersonAddress.value.trim()=="")
	{	
		alert("This Address field can not be empty");
		f.txtReportedPersonAddress.focus();
		return false ;
	}
	else if(f.txtAge.value.trim()=="")
	{	
		alert("This Age field can not be empty");
		f.txtAge.focus();
		return false ;
	}
	else if(f.txtFoundDate.value.trim()=="")
	{	
		alert("This found date field can not be empty");
		f.txtFoundDate.focus();
		return false ;
	}
	else if(f.txtFoundPlace.value.trim()=="")
	{	
		alert("This Found Place field can not be empty");
		f.txtFoundPlace.focus();
		return false ;
	}
	else if(f.txtIdentificationMarks.value.trim()=="")
	{	
		alert("This Identification Marks field can not be empty");
		f.txtIdentificationMarks.focus();
		return false ;
	}
	else if(f.txtContactForKid.value.trim()=="")
	{	
		alert("This Contact field can not be empty");
		f.txtContactForKid.focus();
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
            $('#txtFoundDate').datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
	