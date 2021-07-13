<?php
	
	session_start(); 
        
	$link =  mysqli_connect( "localhost", "admin", "ras9594Z", "myxpressions" );
        
                
                    if (mysqli_connect_errno()) 
                        {
                            printf("Connect failed: %s\n", mysqli_connect_error());
                            exit();
                        }

                 if( isset( $_REQUEST["username"] ) )
	{
                     
                                       $musername = $_REQUEST["username"];
                                       $mpassword = $_REQUEST["password"];
                      
                                       $user_exist = get_user_by_email($musername);
                                       
		if( $user_exist )
		{
			$_SESSION["user_connected"] = true;
                                                            if ($mpassword != $mnpassword)
                                                            {
                                                                die('Oh! God your password is incorrect!!!');
                                                            }
                                                              
                                        	header("Location: ../../index.html");
		}
		else
		{
                    
                                                        $_SESSION["user_connected"]=false;
                                                        unset($_SESSION);
                                                        die('Login ID or Password is INCORRECT !!');
                                                        header("Location: ../../index.html");
		}
	}
        
                
      
                                       function mysqli_query_excute( $sql )
                                        {
                                                global $link;
                                                global mnemail;
                                                global mnpassword;

                                                 $result = mysqli_query( $link, $sql );
                                                 $table_data_array = mysqli_fetch_array($result);
                                                 $mnemail = $table_data_array['mysub_email'];
                                                 $mnpassword = $table_data_array['mysub_password'];
                                                 
                                                if(  ! $result )
                                                {
                                                        $_SESSION["user_connected"]=false;
                                                        unset($_SESSION);
                                                        die('Login ID or Password is INCORRECT !!');
                                                        header("Location: ../../index.html");
                                                     }
                                                if ( $result->num_rows == 0 ) // User doesn't exist
                                                    { 
                                                          $_SESSION['message'] = "User with that email doesn't exist!";
                                                          $_SESSION["user_connected"]=false;
                                                          unset($_SESSION);
                                                          
                                                    }
                                                    else 
                                                   { // User exists (num_rows != 0)
                                                         if ($mpassword === $mnpassword)
                                                            {
                                                                    $_SESSION["user_connected"] = true;
                                                                    header("Location: ../../index.html");
                                                                
                                                            }else
                                                                
                                                            {
                                                                
                                                                echo "<pre><h1>EVERY TIME</h1>";
                                                                print_r($mpassword); echo "<br>";
                                                                print_r($mnpassword);
                                                                $_SESSION['message'] = "Oh! God Acutually your password is incorrect!!!!";
                                                                die('Oh! God Acutually your password is incorrect!!!');
                                                            }
                                                                
                                                          
                                                    }

                                        }

                                       function get_user_by_email( $musername )
                                        {
                                                return mysqli_query_excute( "SELECT * FROM mysubscribers WHERE mysub_email = '$musername'" );
                                                                                                        
                                        }
        
        
        
        
?>