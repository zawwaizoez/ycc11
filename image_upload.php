<?php 
	if(isset($_POST['image_submit']))
	{
			$year=$_POST['year'];
			$major1=$_POST['major1'];
		 

			echo $year;
			echo "<br>".$major1;

			$targetfolder ='resultImages/';
			$photoNameArray=$_FILES['images']['name'];
			$photoTemp = $_FILES['images']['tmp_name'];
			$totalPhoto= count($photoNameArray);
			for ($i=0; $i <$totalPhoto ; $i++) { 
				$upload_images = $targetfolder.basename($photoNameArray[$i]);
				if(move_uploaded_file($photoTemp[$i], $upload_images)){
					echo "success";
				}
				else{
					echo "false";
				}
				# code...
			}


	}
 ?>