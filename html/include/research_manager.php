	<?php
			/////////////// Variable ///////////
			$global_Id;
			$global_AbstractId;
			$global_SourceId;
			$global_TypeId;
			/////////////// Function ///////////
			function add_Research( $head_En , $cont_En , $cont_Th , $author_En , $type , $publish , $publish_Year , $url )
			{
				include "connect_db.php";
				include "img_manager.php";
				$sql = "SELECT MAX(PublicationId) as id FROM PUBLICATION";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $data = mysqli_fetch_array($result);
		        }

				$sql = "SELECT LastMsgKeyNumber as id FROM MSGKEY WHERE MsgKeyPrefix = 'PUBL'";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $mysqli_result = mysqli_fetch_array($result);
		        }
		        $id = intval($mysqli_result['id']);		        
				$abstractid =  sprintf('%05d',$id+1);
				$public_Id = $data['id']+1;
				$source_Id = $data['id']+1;
				$abstract_Id = "PUBL".$abstractid;
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$abstractid' WHERE MsgKeyPrefix = 'PUBL'";
				$result = mysqli_query($dbconn,$sql);
				var_dump($public_Id);
				var_dump($abstract_Id);
				var_dump($source_Id);
		        //$img_Id = manage_Img($type, 0);
				$sql = "INSERT INTO PUBLICATION(PublicationId,Title,Author,Publish,Year,AbstractId,ExternURL) VALUES ('$public_Id','$head_En','$author_En','$publish','$publish_Year','$abstract_Id','$url')"; 
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$abstract_Id','eng','$cont_En')";
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$abstract_Id','tha','$cont_Th')";
				mysqli_query($dbconn,$sql);	
									
				echo "success";		
			}

			function del_Research( $id , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM PUBLICATION WHERE PublicationId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
			    if($result === FALSE) 
			    { 
			        die(mysqli_error($dbconn));
			    } else
			    {
			        $mysqli_result = mysqli_fetch_array($result);

			    }
			    $GLOBALS['global_SourceId'] = $mysqli_result['SourceId'];
			   $GLOBALS['global_AbstractId'] = $mysqli_result['AbstractId'];
				var_dump($GLOBALS['global_AbstractId']);
				var_dump($GLOBALS['global_SourceId']);	
			    $sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$GLOBALS['global_AbstractId']."'";
				mysqli_query($dbconn,$sql);
				//manage_Img( $type , $img_Id);
				$sql = "DELETE FROM PUBLICATION WHERE PublicationId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
			    echo "success";				
			}

			function edit_Research( $id , $head_En , $cont_En , $cont_Th , $author_En , $type , $publish , $publish_Year , $url )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM PUBLICATION WHERE PublicationId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
				if($result === FALSE) 
				{ 
				    die(mysqli_error($dbconn));
				} else
				{
				    $mysqli_result = mysqli_fetch_array($result);

				}
				$GLOBALS['global_AbstractId'] = $mysqli_result['AbstractId'];
				$GLOBALS['global_SourceId'] = $mysqli_result['SourceId'];
				var_dump($GLOBALS['global_AbstractId']);
				var_dump($GLOBALS['global_SourceId']);
								
				$sql = "UPDATE PUBLICATION SET Title='$head_En', Author='$author_En', Publish='$publish', Year='$publish_Year', ExternURL='$url' WHERE PublicationId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_En' WHERE MsgKey='".$GLOBALS['global_AbstractId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_Th' WHERE MsgKey='".$GLOBALS['global_AbstractId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				//////////////// Update Source /////////////////
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