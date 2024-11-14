
<script type="text/javascript" src="JS/EnlargeImage/jquery.min.js"></script> 
<script type="text/JavaScript" src="JS/EnlargeImage/slimbox2.js"></script> 
<link rel="stylesheet" href="CSS/EnlargeImage/slimbox2.css" type="text/css" media="screen" /> 


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$ID=$_REQUEST['ID'];

	$sql = "SELECT * FROM tblfoundkids where ID=$ID";
	include_once "DB/db.php";
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$KidName=$row['KidName'];
		$Sex=$row['Sex'];
		$ReportedPerson=$row['ReportedPerson'];
		$ReportedPersonAddress=$row['ReportedPersonAddress'];
		$Mobile=$row['Mobile'];
		$Age=$row['Age'];
		$FoundDate=$row['FoundDate'];
		$FoundPlace=$row['FoundPlace'];
		$District=$row['District'];
		$IdentificationMarks=$row['IdentificationMarks'];
		$ContactForKid=$row['ContactForKid'];
		$KidPic=$row['KidPic'];
	}
	
	$FoundDate=date('d-m-Y', strtotime($FoundDate));

?>

  <?php
  include("MasterPages/Header.php");
  ?>
  
  <h3>Peoples Details Page</h3>
  
            
<form id="frmUsers" name="frmUsers" method="post" action="" enctype="multipart/form-data">
           	<table id="displaytable">
            	
				<tr>
                	<td style="width:40%;">Peoples Name</td>
                    <td><label id="l2"><?php echo $KidName; ?></label></td>
                </tr>
				
				<tr>
                	<td>Sex</td>
                    <td><label id="l3"><?php echo $Sex; ?></label></td>
                </tr>
				
                	
				<tr>
                	<td>Reported Person </td>
                    <td><label id="l4"><?php echo $ReportedPerson; ?></label></td>
                </tr>
				
				 <tr>
                	<td>Reported Person Address</td>
					<td><label id="l5"><?php echo $ReportedPersonAddress; ?></label></td>
                </tr>
				
				  <tr>
                	<td>Mobile</td>
					<td><label id="l6"><?php echo $Mobile; ?></label></td>
                </tr>
				
				  <tr>
                	<td>Age</td>
					<td><label id="l7"><?php echo $Age; ?></label></td>
                </tr>
				
				  <tr>
                	<td>Found Date</td>
					<td><label id="l8"><?php echo $FoundDate; ?></label></td>
                </tr>
				
				 <tr>
                	<td>Found Place</td>
					<td><label id="l8"><?php echo $FoundPlace; ?></label></td>
                </tr>
				
				<tr>
                	<td>District</td>
					<td><label id="l8"><?php echo $District; ?></label></td>
                </tr>
				
				<tr>
                	<td>Identification Marks</td>
					<td><label id="l8"><?php echo $IdentificationMarks; ?></label></td>
                </tr>
				
					<tr>
                	<td>Contact For Peoples</td>
					<td><label id="l8"><?php echo $ContactForKid; ?></label></td>
                </tr>
				
				<tr>
                	<td>Peoples Pic</td>
					<td> <a rel="lightbox[portfolio]" href="<?php echo $KidPic; ?>" title="<?php echo $KidName; ?>">
	                        <img src="<?php echo $KidPic; ?>" class="previewimg">                           
                        </a>
					</td>
                </tr>
				
				<tr>
                	<td colspan="2" style="text-align:center;">
					<span class="note">Note: Click on Image to view Enlarged Peoples Pic</span>
					</td>
                </tr>
				
				
                <tr>
                	<td colspan="2" style="text-align:center;">
                    
					 <button type="button" name="btnBack" onClick="window.location.href='FoundKidList.php'">Back</button>
                    </td>
                </tr>
                   
           </table>
           </form>
         
  
  
    <?php
  include("MasterPages/Footer.php");
  ?>
  