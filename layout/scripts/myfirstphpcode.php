<?php

ini_set("display_errors",1);
error_reporting(E_ALL);





	if (isset($_POST["btnsubmit"]))
	    {


			$host="localhost";
			$user="root";
			$password="";
			$db="mysql";
			$uname="";
			$eemail="";
			$redirect_url="/index.html/";


			$email_from = "aditi.ram.sharma@gmail.com";
			$email_subject = "New Form Submission on XpressionSUNlimited.com";
 
 
 echo $email_from;
 echo $email_subject;
 
			$con = mysqli_connect($host,$user,$password,$db);


    
		    if (isset($POST["Name"]))
			    {
	    
			    	$uname=$_POST["Name"];
			    	echo $uname;
			    	echo " is your username";
			    }
		    else
			    {
			    	$user = null;
			  		echo "no username supplied";
			    }
    
    
    
		     if (isset($POST["Email"]))
			    {
    
    				$uemail=$_POST["Email"];
    				echo $uemail;
    				echo " is your username";
    			}
    			else
    			{
    				$uemail = null;
  					echo "no username supplied";
    			}

        
    $sql="insert into myvisitors(myvisit_name,myvisit_email) values("  .$uname.  ","  .$uemail.    ")";
    
    echo " ==> ".$sql. "   <== ";
    
    $result=mysqli_query($con,$sql);
    
    $email_body = "User Name : $uname \n"." User Email : $uemail \n";
   					
   	$tomyself = "ram@xpressionsunlimited.com";
   	
   	mail($tomyself, $email_subject, $email_body);
   	
   	echo "  ==> ".$redirect_url." <==";
    
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Inserted [Records..]";
        /* header("location: $redirect_url \n");
        exit(); */
    }
    else{
        echo " Some Problem Insterting Record!!";
       /* header("location: $redirect_url \n");
        exit(); */
    }
    
  
    /* header("location: $redirect_url \n"); */
        
}

?>
