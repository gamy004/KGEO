	<?php
			/////////////// include DB /////////
			include "../include/coll_manager.php";			

			/////////////// Functional method /////////
			function test_input($data) 
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			function upload_img()
			{
				include "../include/connect_db.php";
				$typeimg = substr($_FILES["filUpload"]["name"],strlen($_FILES["filUpload"]["name"])-4) ;
				$filename = time().$typeimg;
				move_uploaded_file($_FILES["filUpload"]["tmp_name"],
							   "../content_img/".$filename);
				$sql = "SELECT MAX(PicId) as id FROM PICTURE";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $mysqli_result = mysqli_fetch_array($result);

		        }
				$picid = $mysqli_result['id']+1;
				$sql = "INSERT INTO PICTURE(PicId,Name,Location) 
						VALUES ('$picid','$filename','./content_img/')"; 
				mysqli_query($dbconn,$sql);
				return $picid;
			}
			
			/////////////// Variable ///////////
			$check_content = isset($_POST['content']);
			$check_type = isset($_POST['type']);

			/////////////// Procedure ///////////
			if($_POST ==NULL && $_FILES==NULL)
			{
			echo 'SIZE IMAGE MORE THAN 2 MB';
			}
			if ($check_content && $check_type) 
			{
				$content = test_input($_POST['content']);
				$type = test_input($_POST['type']);

				switch ($content) 
				{
					case 'collaborator':

						switch ($type) 
						{
							case 'add':
								if(isset($_POST['nameth']) && isset($_POST['nameen']))
								{
									$name_En = test_input($_POST['nameen']);
									$name_Th = test_input($_POST['nameth']);
									$url = test_input($_POST['website']);
									$type = test_input($_POST['check']);
									$img_Id = upload_img();
								}
								add_Coll( $name_En , $name_Th , $img_Id , $url , $type );
								break;

							case 'del':
								del_Coll();
								break;

							case 'edit':
								edit_Coll();
								break;
							
							default:
								echo "failed";
								break;
						}
						break;
			/////////////// Collaborator case ///////////
					default:
						echo "failed";
						break;
				}
			} else 
			{
				echo "failed";
			}
			

	 ?>
