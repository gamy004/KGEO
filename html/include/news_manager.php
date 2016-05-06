	<?php
			/////////////// Variable ///////////
			$global_Id;
			$global_HeadId;
			$global_ContId;
			/////////////// Function ///////////
			function add_News( $head_En , $head_Th, $cont_En , $cont_Th , $date , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$sql = "SELECT MAX(NewsId) as id , MAX(DisplayOrder) as disorder FROM NEWS ";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $mysqli_result = mysqli_fetch_array($result);
		        }
				$id =  $mysqli_result['id']+1;
				$order = $mysqli_result['disorder']+1;
				$sql = "SELECT LastMsgKeyNumber as id FROM MSGKEY WHERE MsgKeyPrefix = 'NEWS'";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $data = mysqli_fetch_array($result);
		        }
		        $contid = intval($data['id']);
				$content_Id = sprintf('%05d',$contid+1);
				$head_Id = "HEAD".$content_Id;
				$news_Id = "NEWS".$content_Id;
		        $img_Id = manage_Img($type, 0);
				$sql = "INSERT INTO NEWS(NewsId,PubDate,PicId,DisplayOrder) VALUES ('$id','$date','$img_Id','$order')"; 
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE NEWS SET HeadlineId='$head_Id',ContentId='$news_Id' WHERE NewsId='$id'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$content_Id' WHERE MsgKeyPrefix = 'NEWS'";
				$result = mysqli_query($dbconn,$sql);
				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$head_Id','eng','$head_En')";
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$head_Id','tha','$head_Th')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$news_Id','eng','$cont_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$news_Id','tha','$cont_Th')";
				mysqli_query($dbconn,$sql);	
				echo "success";		
			}

			function del_News( $id , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql    = "SELECT * FROM NEWS WHERE NewsId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
			    if($result === FALSE) 
			    { 
			        die(mysqli_error($dbconn));
			    } else
			    {
			        $mysqli_result = mysqli_fetch_array($result);

			    }
			    $img_Id = $mysqli_result['PicId'];
			   	$GLOBALS['global_HeadId'] = $mysqli_result['HeadlineId'];
				$GLOBALS['global_ContId'] = $mysqli_result['ContentId'];
			    $sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$GLOBALS['global_HeadId']."' OR MsgKey='".$GLOBALS['global_ContId']."'";
				mysqli_query($dbconn,$sql);
				manage_Img( $type , $img_Id);
				$sql = "DELETE FROM NEWS WHERE NewsId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
			    echo "success";				
			}

			function edit_News( $head_En , $head_Th, $cont_En , $cont_Th , $id , $date , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "UPDATE NEWS SET PubDate='$date' WHERE NewsId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
				$sql = "SELECT * FROM NEWS WHERE NewsId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
				if($result === FALSE) 
				{ 
				    die(mysqli_error($dbconn));
				} else
				{
				    $mysqli_result = mysqli_fetch_array($result);

				}
				$GLOBALS['global_HeadId'] = $mysqli_result['HeadlineId'];
				$GLOBALS['global_ContId'] = $mysqli_result['ContentId'];				
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_En' WHERE MsgKey='".$GLOBALS['global_HeadId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_Th' WHERE MsgKey='".$GLOBALS['global_HeadId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_En' WHERE MsgKey='".$GLOBALS['global_ContId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_Th' WHERE MsgKey='".$GLOBALS['global_ContId']."' AND Lang='tha'";
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