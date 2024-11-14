
<script type="text/javascript" src="JS/EnlargeImage/jquery.min.js"></script> 
<script type="text/JavaScript" src="JS/EnlargeImage/slimbox2.js"></script> 
<link rel="stylesheet" href="CSS/EnlargeImage/slimbox2.css" type="text/css" media="screen" /> 


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$ID=$_REQUEST['ID'];

	$sql = "SELECT * FROM tblmissingklds where ID=$ID";
	include_once "DB/db.php";
	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$KidName=$row['KidName'];
		$ParentName=$row['ParentName'];
		$Address=$row['Address'];
		$Mobile=$row['Mobile'];
		$Sex=$row['Sex'];
		$DOB=$row['DOB'];
		$Height=$row['Height'];
		$Weight=$row['Weight'];
		$DateofDisappear=$row['DateofDisappear'];
		$PlaceofDisappear=$row['PlaceofDisappear'];
		$IdentificationMarks=$row['IdentificationMarks'];
		$KidPic=$row['KidPic'];
	}
	
	$DOB=date('d-m-Y', strtotime($DOB));
	$DateofDisappear=date('d-m-Y', strtotime($DateofDisappear));
?>

  <?php
  include("MasterPages/Header.php");
  ?>
  
  <h3>Peoples Details Page</h3>
  
            
<form id="frmUsers" name="frmUsers" method="post" action="" enctype="multipart/form-data">
           	<table id="displaytable">
            	
				<tr>
                	<td>Peoples Name</td>
                    <td><label id="l2"><?php echo $KidName; ?></label></td>
                </tr>
				
				<tr>
                	<td>Parent Name</td>
                    <td><label id="l3"><?php echo $ParentName; ?></label></td>
                </tr>
				
                	
				<tr>
                	<td>Address </td>
                    <td><label id="l4"><?php echo $Address; ?></label></td>
                </tr>
				
				 <tr>
                	<td>Mobile</td>
					<td><label id="l5"><?php echo $Mobile; ?></label></td>
                </tr>
				
				  <tr>
                	<td>Sex</td>
					<td><label id="l6"><?php echo $Sex; ?></label></td>
                </tr>
				
				  <tr>
                	<td>DOB</td>
					<td><label id="l7"><?php echo $DOB; ?></label></td>
                </tr>
				
				  <tr>
                	<td>Height</td>
					<td><label id="l8"><?php echo $Height; ?></label></td>
                </tr>
				
				 <tr>
                	<td>Weight</td>
					<td><label id="l8"><?php echo $Weight; ?></label></td>
                </tr>
				
				<tr>
                	<td>Date of Disappear</td>
					<td><label id="l8"><?php echo $DateofDisappear; ?></label></td>
                </tr>
				
				<tr>
                	<td>Place of Disappear</td>
					<td><label id="l8"><?php echo $PlaceofDisappear; ?></label></td>
                </tr>
				
					<tr>
                	<td>Identification Marks</td>
					<td><label id="l8"><?php echo $IdentificationMarks; ?></label></td>
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
                    
					 <button type="button" name="btnBack" onClick="window.location.href='MissingKidsList.php'">Back</button>
                    </td>
                </tr>
                   
           </table>
           </form>
         
  
  
    <?php
  include("MasterPages/Footer.php");
  ?>
  