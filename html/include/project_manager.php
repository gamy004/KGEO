	<?php
			/////////////// Variable ///////////
			$global_Id;
			$global_TitleId;
			$global_ClientId;
			$global_DescriptionId;
			$global_TypeId;
			$global_AuthorId;
			/////////////// Function ///////////
			function add_Proj( $head_En , $head_Th, $cont_En , $cont_Th , $client_En , $client_Th , $author_En , $author_Th )
			{
				include "connect_db.php";
				include "img_manager.php";
				$sql = "SELECT MAX(ProjectId) as id, MAX(DisplayOrder) as disorder FROM PROJECT";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $data = mysqli_fetch_array($result);
		        }

				$sql = "SELECT LastMsgKeyNumber as id FROM MSGKEY WHERE MsgKeyPrefix = 'PROJ'";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $mysqli_result = mysqli_fetch_array($result);
		        }
		        $id = intval($mysqli_result['id']);		        
				$titleid =  sprintf('%05d',$id+1);
				$clientid =  sprintf('%05d',$id+2);
				$descriptionid =  sprintf('%05d',$id+3);
				$authorid =  sprintf('%05d',$id+4);
				$proj_Id = $data['id']+1;
				$order = $data['disorder']+1;
				$title_Id = "PROJ".$titleid;
				$client_Id = "PROJ".$clientid;
				$description_Id = "PROJ".$descriptionid;
				$author_Id = "PROJ".$authorid;
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$authorid' WHERE MsgKeyPrefix = 'PROJ'";
				$result = mysqli_query($dbconn,$sql);
				var_dump($proj_Id);
				var_dump($title_Id);
				var_dump($client_Id);
				var_dump($description_Id);
				var_dump($author_Id);
				
		        //$img_Id = manage_Img($type, 0);
				$sql = "INSERT INTO PROJECT(ProjectId,TitleId,ClientId,DescriptionId,DisplayOrder,AuthorityId) VALUES ('$proj_Id','$title_Id','$client_Id','$description_Id','$order','$author_Id')"; 
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$title_Id','eng','$head_En')";
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$title_Id','tha','$head_Th')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$client_Id','eng','$client_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$client_Id','tha','$client_Th')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$description_Id','eng','$cont_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$description_Id','tha','$cont_Th')";
				mysqli_query($dbconn,$sql);
				if ( $author_En != '0' && $author_Th != '0' ) {
					$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$author_Id','eng','$author_En')";
					mysqli_query($dbconn,$sql);
					$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$author_Id','tha','$author_Th')";
					mysqli_query($dbconn,$sql);
				}
					
				echo "success";		
			}

			function del_Proj( $id , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM PROJECT WHERE ProjectId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
			    if($result === FALSE) 
			    { 
			        die(mysqli_error($dbconn));
			    } else
			    {
			        $mysqli_result = mysqli_fetch_array($result);

			    }
			    $img_Id = $mysqli_result['PicId'];
			   	$GLOBALS['global_TitleId'] = $mysqli_result['TitleId'];
				$GLOBALS['global_ClientId'] = $mysqli_result['ClientId'];
				$GLOBALS['global_DescriptionId'] = $mysqli_result['DescriptionId'];
				$GLOBALS['global_AuthorId'] = $mysqli_result['AuthorityId'];
				var_dump($GLOBALS['global_TitleId']);
				var_dump($GLOBALS['global_ClientId']);
				var_dump($GLOBALS['global_DescriptionId']);
				var_dump($GLOBALS['global_AuthorId']);	
			    $sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$GLOBALS['global_TitleId']."' OR MsgKey='".$GLOBALS['global_ClientId']."' OR MsgKey='".$GLOBALS['global_DescriptionId']."' OR MsgKey='".$GLOBALS['global_AuthorId']."'";
				mysqli_query($dbconn,$sql);
				//manage_Img( $type , $img_Id);
				$sql = "DELETE FROM PROJECT WHERE ProjectId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
			    echo "success";				
			}

			function edit_Proj( $id , $head_En , $head_Th, $cont_En , $cont_Th , $client_En , $client_Th , $author_En , $author_Th )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM PROJECT WHERE ProjectId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
				if($result === FALSE) 
				{ 
				    die(mysqli_error($dbconn));
				} else
				{
				    $mysqli_result = mysqli_fetch_array($result);

				}
				$GLOBALS['global_TitleId'] = $mysqli_result['TitleId'];
				$GLOBALS['global_ClientId'] = $mysqli_result['ClientId'];
				$GLOBALS['global_DescriptionId'] = $mysqli_result['DescriptionId'];
				$GLOBALS['global_AuthorId'] = $mysqli_result['AuthorityId'];
				var_dump($GLOBALS['global_TitleId']);
				var_dump($GLOBALS['global_ClientId']);
				var_dump($GLOBALS['global_DescriptionId']);
				var_dump($GLOBALS['global_AuthorId']);				
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_En' WHERE MsgKey='".$GLOBALS['global_TitleId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_Th' WHERE MsgKey='".$GLOBALS['global_TitleId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_En' WHERE MsgKey='".$GLOBALS['global_DescriptionId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_Th' WHERE MsgKey='".$GLOBALS['global_DescriptionId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$client_En' WHERE MsgKey='".$GLOBALS['global_ClientId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$client_Th' WHERE MsgKey='".$GLOBALS['global_ClientId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$author_En' WHERE MsgKey='".$GLOBALS['global_AuthorId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$author_Th' WHERE MsgKey='".$GLOBALS['global_AuthorId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);

				if(!$_FILES["filUpload"]['error'])
				{
					if($mysqli_result['PicId'])
					{
						$img_Id  = $mysqli_result['PicId'];
						manage_Img( $type , $img_Id );
					}
				}
				echo "success";
			}		
	 ?>