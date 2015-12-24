<?php

        $db_connection = mysqli_connect("HOSTNAME","DATABASE_USERNAME","DATABASE_PASSWORD","DATABASE_NAME") or die("Connection error " . mysqli_error($db_connection));
	//The line below makes a connection between you and your database :)
	//HOSTNAME is the name of your Hostname and You sould change DATABASE_USERNAME , DATABASE_PASSWORD, DATABASE_NAME to what it should be 


        $db_fetch = "select COLUMN_ONE,COLUMN_TWO from DATABASE_TABLE";//this makes a query to the database and select what you want to show as a json 
	        $db_result = mysqli_query($db_connection,$db_fetch) or die("Error while Quering from database " . mysqli_error($db_connection\
		));
		//Do the query

        $json_array = array();
	        while ($row=mysqli_fetch_assoc($db_result))
		        {

                $json_array[] = $row;

                }// it's obvious :))
		                $json_array = array_map("utf8_encode", $json_array);
				//echo json_encode($json_array);  //this line is for if you want to just show the json-styled query tin the php file to the user

       $json_write = fopen('export_data.json', 'w');
              fwrite($json_write, json_encode($json_array));
	             fclose($json_write);

//this lines make te query into the file called export_data.json .change it as you wish :)
/best wishes :) 

?>
