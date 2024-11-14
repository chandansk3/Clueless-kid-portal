
  <?php
   session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DB/db.php";

	$Mobile=$_SESSION['Mobile'];
	$VerificationCode=$_SESSION['VerificationCode'];
	$District=$_SESSION['District'];

  include("MasterPages/Header.php");
  ?>
  
  <h3>Parent Mobile Verification</h3>
  
            
                   <form id="frmverification" name="frmverification" method="post" action="">
           	<table id="bigtable">
            	<tr>
                	<td style="width:38%;">Mobile</td>
					<td><input type="text" name="txtMobile" maxlength="10" value="<?php echo $Mobile; ?>" readonly="readonly"/></td>
                </tr>
       			
				<tr>
                	<td style="width:38%;">District</td>
					<td><input type="text" name="txtDistrict" maxlength="10" value="<?php echo $District; ?>" readonly="readonly"/></td>
                </tr>
				
				<tr>
                	<td>Verification Code</td>
					<td><input type="text" name="txtVerificationCode" maxlength="5" value="<?php echo $VerificationCode; ?>"/></td>
                </tr>
				
				 <tr>
            <td>Station</td>
            <td>
    			 <select name="cmbStation" >
        		    <option value="0">Select</option>
      				<?php
						 $sql = "SELECT DISTINCT(PoliceStation) FROM tblpolicestation where District='$District'";
						$res=execute($sql);	
						
					   	while($result = $res->fetch_assoc())
        				{
	  			      ?>
				            <option value = "<?php echo $result['PoliceStation']?>"><?php echo $result['PoliceStation'] ?></option>                           
        				<?php
							}
						?>
                        </select>
                        </td>
            </tr>
               
                <tr>
                	<td colspan="2" style="text-align:center;">
                     <input type="submit" name="btnVerify" onClick="return check(frmverification)" value="Verify" />
                  
                     <button type="button" name="btnCancel" onClick="window.location.href='MissingKidsList.php'">Back</button>
                    </td>
				
                </tr>
           </table>
           </form>
         
  
  
    <?php
  include("MasterPages/Footer.php");
  ?>
  
  
  
  <?php

 
if (isset($_POST['btnVerify'])) 
{
	$VerificationCode=$_REQUEST['txtVerificationCode'];
	$Mobile=$_REQUEST['txtMobile'];
	$Station=$_REQUEST['cmbStation'];
	$District=$_REQUEST['txtDistrict'];
	
	if($VerificationCode==$_SESSION['VerificationCode'])
	{
		$_SESSION['VerificationCode']=$VerificationCode;
		$_SESSION['VMobile']=$Mobile;
		$_SESSION['VStation']=$Station;
		$_SESSION['VDistrict']=$District;
		
		echo "<script type='text/javascript'> alert('Verified Successfully');</script>";

		echo "<meta http-equiv='refresh' content='0;url=ReportFoundKid3.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Invalid Verification Code');</script>";
	}

}
  ?>
  
<script language="javascript">
function check(f)
{

if(f.txtVerificationCode.value.trim()=="")
{
alert("Enter Proper Verification Code");
f.txtVerificationCode.focus();
return false ;
}
}
</script>
