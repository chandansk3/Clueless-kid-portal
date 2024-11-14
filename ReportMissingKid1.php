
  <?php
 session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "DB/db.php";

if (isset($_POST['btnVerify'])) 
{
	$mobileno=$_REQUEST['txtMobile'];
	$District=$_REQUEST['cmbDistrict'];
	
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
       $VerificationCode = substr(str_shuffle( $chars ), 0, 5);
	    
		$str="Dear User, Your verification code is ".$VerificationCode." Please verify";
    	$_SESSION['Mobile']=$mobileno;
	    $_SESSION['VerificationCode']=$VerificationCode;
		$_SESSION['District']=$District;
		
		echo "<script type='text/javascript'>
window.open('http://s.exonics.co.in/api/sendmsg.php?user=chetanpuc&pass=chetan12345678&sender=CHETAN&phone=$mobileno&text=$str Message&priority=ndnd&stype=normal');</script>";
		echo "<meta http-equiv='refresh' content='0;url=ReportMissingKid2.php'>";
}
 
  
  include("MasterPages/Header.php");
  ?>
  
  <h3>Parent Mobile Verification</h3>
  
            
                   <form id="frmverification" name="frmverification" method="post" action="">
           	<table id="logintable">
            	<tr>
                	<td style="width:38%;">Mobile</td>
					<td><input type="text" name="txtMobile" maxlength="10" onKeyPress="return numbersonly(event, false)"/></td>
                </tr>
       			
				 <tr>
            <td>District</td>
            <td>
    			 <select name="cmbDistrict" >
        		    <option value="0">Select</option>
      				<?php
						 $sql = "SELECT DISTINCT(District) FROM tbldistrict";
						$res=execute($sql);	
						
					   	while($result = $res->fetch_assoc())
        				{
	  			      ?>
				            <option value = "<?php echo $result['District']?>"><?php echo $result['District'] ?></option>                           
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
  
  

  
<script language="javascript">
function check(f)
{

if(f.txtMobile.value.trim()=="" || checkmobile(f.txtMobile)==false)
{
alert("Enter Proper Mobile Number");
f.txtMobile.focus();
return false ;
}
else if(f.cmbDistrict.value=="0")
{
alert("Select District");
f.cmbDistrict.focus();
return false ;
}
}
</script>
