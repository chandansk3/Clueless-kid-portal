
  <?php
    include_once "DB/db.php";
  include("Masterpages/Header.php");
  ?>
  
   <h3>Missing Peoples List</h3>
  
  <br />
    <button type="button" name="btncancel" onClick="window.location.href='ReportMissingKid1.php'" style="width:250px;">Report Missing Peoples</button>
  
  
  
  <form id="frmlist" name="frmlist" method="post" action="" enctype="multipart/form-data">
        	
            <table id="logintable">
            <tr>
            <td>Peoples Name</td>
            <td>
    			<input type="text" name="txtKidName" maxlength="100" value="<?php echo isset($_POST['btnSearch']) ? $_POST['txtKidName'] : ''; ?>"/>	
            </td>
            </tr>
			
			<tr>
			<td colspan="2" style="text-align:center;">
			<input type="submit" name="btnSearch" value="Search" />
			</td>
			</tr>
			
            </table>
            </form>
			
  <?php
  
  	if(isset($_REQUEST['btnSearch']))
	{
		$KidName=$_REQUEST['txtKidName'];
		$sql = "SELECT * FROM tblmissingklds where Status='New' and KidName LIKE '%$KidName%'";
	}	
	else
		$sql = "SELECT * FROM tblmissingklds where Status='New'";
			
			$result=execute($sql);	
			if ($result->num_rows > 0) 
			{

?>

	 <table id="fulltable">
     
     <tr><th>Peoples Name</th>
	 <th>Parent Name</th>
     <th>Mobile</th>
	   <th>PIC</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['KidName']; ?></td>
	 <td> <?php echo $row['ParentName']; ?></td>
      <td> <?php echo $row['Mobile']; ?></td>
       <td><?php $KidPic=$row['KidPic'];  ?> <img src="<?php echo $KidPic; ?>" class="previewimg" />
   <td><a class="btn" href="MissingKidView.php?ID=<?php echo $row['ID']; ?>">View</a></td>
	</tr>
<?php
  }
?>

   </table>
   
    <?php
	}
	else
	{
	   echo "No Records Found";
	}

  ?>
  
  
  
        <?php
  include("Masterpages/Footer.php");
  ?>