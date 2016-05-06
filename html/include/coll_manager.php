	<?php
			/////////////// Variable ///////////
			$global_Id;
			$global_NameId;
			/////////////// Function ///////////
			function add_Coll( $name_En , $name_Th , $url , $col_Type , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$sql = "SELECT MAX(CollaboratorId) as id FROM COLLABORATOR";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $mysqli_result = mysqli_fetch_array($result);
		        }
				$id =  $mysqli_result['id']+1;
				$sql = "SELECT LastMsgKeyNumber as id FROM MSGKEY WHERE MsgKeyPrefix = 'COLL'";
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
		        $coll_Id = "COLL".$content_Id;
		        $img_Id = manage_Img( $type , 0);
				$sql = "INSERT INTO COLLABORATOR(CollaboratorId,NameId,Type,PicId,Website) 
						VALUES ('$id','$coll_Id','$col_Type','$img_Id','$url')";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$content_Id' WHERE MsgKeyPrefix = 'COLL'";
				mysqli_query($dbconn,$sql);
				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$coll_Id','eng','$name_En')";
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$coll_Id','tha','$name_Th')";
				mysqli_query($dbconn,$sql);	
				echo "success";		
			}

			function del_Coll( $id , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql    = "SELECT * FROM COLLABORATOR WHERE CollaboratorId='$id'";
				$result = mysqli_query($dbconn,$sql);
			    if($result === FALSE) 
			    { 
			        die(mysqli_error($dbconn));
			    } else
			    {
			        $data = mysqli_fetch_array($result);

			    }
			    $img_Id = $data['PicId'];
			    $GLOBALS['global_NameId'] = $data['NameId'];
			    $sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$GLOBALS['global_NameId']."'";
				mysqli_query($dbconn,$sql);
				$sql = "DELETE FROM COLLABORATOR WHERE CollaboratorId='".$GLOBALS['global_Id']."'";
				mysqli_query($dbconn,$sql);
			    manage_Img( $type , $img_Id);
			    echo "success";				
			}

			function edit_Coll( $name_En , $name_Th , $id , $url , $col_Type , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql    = "SELECT * FROM COLLABORATOR WHERE CollaboratorId='$id'";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $data = mysqli_fetch_array($result);

		        }
				$content_Id = $data['NameId'];

				$sql    = "UPDATE CONTENTTEXT SET TextMsg='$name_En' WHERE MsgKey='$content_Id' AND Lang='eng'";
				mysqli_query($dbconn,$sql);

				$sql    = "UPDATE CONTENTTEXT SET TextMsg='$name_Th' WHERE MsgKey='$content_Id' AND Lang='tha'";
				mysqli_query($dbconn,$sql);

				$sql    = "UPDATE COLLABORATOR SET Website='$url' WHERE CollaboratorId='$id'";
				mysqli_query($dbconn,$sql);

				$sql    = "UPDATE COLLABORATOR SET Type='$col_Type' WHERE CollaboratorId='$id'";
				mysqli_query($dbconn,$sql);

				if(!$_FILES["filUpload"]['error'])
				{
					if($data['PicId'])
					{
						$img_Id = $data['PicId'];
						manage_Img( $type , $img_Id);
					}
				}
				echo "success";
			}		
	 ?>