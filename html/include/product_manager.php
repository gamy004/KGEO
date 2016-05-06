	<?php
			/////////////// Variable ///////////
			$global_Id;
			$global_NameId;
			$global_PicId;
			$global_SourceId;
			$global_DescriptionId;
			/////////////// Function ///////////
			function add_Product( $head_En , $head_Th, $cont_En , $cont_Th , $url )
			{
				include "connect_db.php";
				include "img_manager.php";
				$sql = "SELECT MAX(ProductId) as id, MAX(DisplayOrder) as disorder FROM PRODUCT";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $data = mysqli_fetch_array($result);
		        }

				$sql = "SELECT LastMsgKeyNumber as id FROM MSGKEY WHERE MsgKeyPrefix = 'PROD'";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $mysqli_result = mysqli_fetch_array($result);
		        }
		        $id = $data['id']+1;
		        $order = $data['disorder']+1;
		        $contid = intval($mysqli_result['id']);        
				$nameid =  sprintf('%05d',$contid+1);
				//$departmentid =  sprintf('%05d',$id+3);
				$descriptionid =  sprintf('%05d',$contid+2);
				$product_Id = $data['id']+1;
				$name_Id = "PROD".$nameid;
				//$department_Id = "EDCT".$departmentid;
				$description_Id = "PROD".$descriptionid;
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$descriptionid' WHERE MsgKeyPrefix = 'PROD'";
				$result = mysqli_query($dbconn,$sql);
				var_dump($name_Id);
				var_dump($description_Id);
				
		        //$img_Id = manage_Img($type, 0);
				$sql = "INSERT INTO PRODUCT( ProductId , NameId , DescriptionId , ExternURL, DisplayOrder) VALUES ('$id','$name_Id','$description_Id','$url', '$order')"; 
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$descriptionid' WHERE MsgKeyPrefix = 'PROD'";
				$result = mysqli_query($dbconn,$sql);
				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$name_Id','eng','$head_En')";
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$name_Id','tha','$head_Th')";
				mysqli_query($dbconn,$sql);	
				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$description_Id','eng','$cont_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$description_Id','tha','$cont_Th')";
				mysqli_query($dbconn,$sql);
					
				echo "success";		
			}

			function del_Product( $id , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM PRODUCT WHERE ProductId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
			    if($result === FALSE) 
			    { 
			        die(mysqli_error($dbconn));
			    } else
			    {
			        $mysqli_result = mysqli_fetch_array($result);

			    }
			    
			   	$GLOBALS['global_NameId'] = $mysqli_result['NameId'];
				$GLOBALS['global_DescriptionId'] = $mysqli_result['DescriptionId'];
				$GLOBALS['global_PicId'] = $mysqli_result['PicId'];
				$GLOBALS['global_SourceId'] = $mysqli_result['SourceId'];
				var_dump($GLOBALS['global_NameId']);
				var_dump($GLOBALS['global_DescriptionId']);
				var_dump($GLOBALS['global_PicId']);
				var_dump($GLOBALS['global_SourceId']);
			    $sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$GLOBALS['global_NameId']."' OR MsgKey=".$GLOBALS['global_DescriptionId'];
				mysqli_query($dbconn,$sql);
				//manage_Img( $type , $img_Id);
				$sql = "DELETE FROM PRODUCT WHERE ProductId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
			    echo "success";				
			}

			function edit_Product( $id , $head_En , $head_Th, $cont_En , $cont_Th , $url )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM PRODUCT WHERE ProductId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
				if($result === FALSE) 
				{ 
				    die(mysqli_error($dbconn));
				} else
				{
				    $mysqli_result = mysqli_fetch_array($result);

				}
				$GLOBALS['global_NameId'] = $mysqli_result['NameId'];
				$GLOBALS['global_DescriptionId'] = $mysqli_result['DescriptionId'];
				$GLOBALS['global_PicId'] = $mysqli_result['PicId'];
				$GLOBALS['global_SourceId'] = $mysqli_result['SourceId'];
				var_dump($GLOBALS['global_NameId']);
				var_dump($GLOBALS['global_DescriptionId']);
				var_dump($GLOBALS['global_PicId']);
				var_dump($GLOBALS['global_SourceId']);
				$sql = "UPDATE PRODUCT SET ExternURL='$url' WHERE ProductId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);		
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_En' WHERE MsgKey='".$GLOBALS['global_NameId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_Th' WHERE MsgKey='".$GLOBALS['global_NameId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_En' WHERE MsgKey='".$GLOBALS['global_DescriptionId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_Th' WHERE MsgKey='".$GLOBALS['global_DescriptionId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				if(!$_FILES["filUpload"]['error'])
				{
					if($mysqli_result['SourceId'])
					{
						$img_Id  = $mysqli_result['SourceId'];
						manage_Img( $type , $img_Id );
					}
				}
				echo "success";
			}		
	 ?>