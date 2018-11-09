<?php 
if(isset($_POST['login'])){
              $con = mysqli_connect("localhost","root","","ycc");
               
              $roll = addslashes(strip_tags($_POST['roll']));
              
               $password=addslashes(strip_tags($_POST['password']));
              echo $roll."<===is roll<br>";
               echo $password."<===is password<br>";
             $query = "SELECT *  FROM users WHERE Roll_No='$roll' AND Password='$password'";
             $result = mysqli_query($con,$query);
             if(mysqli_num_rows($result)==1)
             {
             	$table= $roll;
				$table =preg_replace("/\s/u", '', $table);
			    $table =preg_replace("/-/", '', $table);

			    $table = strtolower($table);
			    $mroll = $table;
			    if(substr($mroll, 1,2)=='ce')
			    {
			     $table=  substr($table, 0,3);
			     		     
			    }
			    else
			    {
			      $table=  substr($table, 0,4);
			       
			    }
			    
			    $query = "SELECT * FROM ".$table." WHERE Roll_No = '$roll'";
			    
			     $result = mysqli_query($con,$query);
			      
			      if(mysqli_num_rows($result)==1)
			      {
			      	 echo "Congratulations!<br>";
			      	  while ($row=$result->fetch_assoc()) {
			      	  	 echo "Your New Roll No =>".$row["ID"]       ."<br>";
			      	  	 echo "Your Name        =>".$row["Name"]     ."<br>";
			      	  	 echo "Your Destinction =>".$row["Distinction"]."<br>";
			      	  	 echo "Your Remark      =>".$row["Remark"]    ."<br>";
			      	  	 

			      	  }
			      }
			      else
			      {
			      	echo "fail";
			      }
             }
              else{
              	echo "can't login";
              }
       	             
              
             
          }


 ?>