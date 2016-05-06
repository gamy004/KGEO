<?php
			function manage_Img( $type , $img_Id )
			{
				include "connect_db.php";
				switch ($type) 
				{
					/////////////// ADD case ///////////
					case 'add':
						$typeimg = substr($_FILES["filUpload"]["name"],strlen($_FILES["filUpload"]["name"])-4);
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
						break;
					/////////////// Edit case ///////////
					case 'edit':
						$sql = "SELECT * FROM PICTURE WHERE PicId='$img_Id'";
						$result = mysqli_query($dbconn,$sql) ;
		                 if($result === FALSE) 
		                { 
		                    die(mysqli_error($dbconn));
		                }else
		                {
		                    $img = mysqli_fetch_array($result);
		        
		                }
						$img = ".".$img['Location'].$img['Name'];
						$typeimg = substr($_FILES["filUpload"]["name"],strlen($_FILES["filUpload"]["name"])-4) ;
						$filename = time().$typeimg;
						move_uploaded_file($_FILES["filUpload"]["tmp_name"],
		       					   "../content_img/".$filename);
						unlink($img);
						$sql = "UPDATE PICTURE SET Name='".$filename."' WHERE PicId='$img_Id'";
						mysqli_query($dbconn,$sql);
						break;
					/////////////// DELETE case ///////////
					case 'del':
						$sql = "SELECT * FROM PICTURE WHERE PicId='$img_Id'";
						$result = mysqli_query($dbconn,$sql);
					     if($result === FALSE) 
					    { 
					        die(mysqli_error($dbconn));
					    } else
					    {
					        $img = mysqli_fetch_array($result);

					    }						   
						$filename = ".".$img['Location'].$img['Name'];									
						if($img_Id != NULL){
						$sql = "DELETE FROM PICTURE WHERE PicId='$img_Id'";
						mysqli_query($dbconn,$sql);}						
						if($img_Id != NULL)unlink($filename);
						break;
					
					default:
						echo "upload failed";
						break;
				}
			}
?>