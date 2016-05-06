	<?php
			/////////////// Variable ///////////
			$global_Id;
			$global_TitleId;
			$global_InstructorId;
			$global_DepartmentId;
			$global_DescriptionId;
			/////////////// Function ///////////
			function add_Education( $head_En , $head_Th, $cont_En , $cont_Th , $instruc_En , $instruc_Th , $depart_En , $depart_Th , $semester , $url )
			{
				include "connect_db.php";
				include "img_manager.php";
				$sql = "SELECT MAX(CourseId) as id FROM EDUCATION";
				$result = mysqli_query($dbconn,$sql);
		        if($result === FALSE) 
		        { 
		            die(mysqli_error($dbconn));
		        } else
		        {
		            $data = mysqli_fetch_array($result);
		        }

				$sql = "SELECT LastMsgKeyNumber as id FROM MSGKEY WHERE MsgKeyPrefix = 'EDCT'";
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
				$instructorid =  sprintf('%05d',$id+2);
				//$departmentid =  sprintf('%05d',$id+3);
				$descriptionid =  sprintf('%05d',$id+3);
				$education_Id = $data['id']+1;
				$title_Id = "EDCT".$titleid;
				$instructor_Id = "EDCT".$instructorid;
				//$department_Id = "EDCT".$departmentid;
				$description_Id = "EDCT".$descriptionid;
				$sql = "UPDATE MSGKEY SET LastMsgKeyNumber='$descriptionid' WHERE MsgKeyPrefix = 'EDCT'";
				$result = mysqli_query($dbconn,$sql);
				var_dump($education_Id);
				var_dump($title_Id);
				var_dump($instructor_Id);
				var_dump($department_Id);
				var_dump($description_Id);
				
		        //$img_Id = manage_Img($type, 0);
				$sql = "INSERT INTO EDUCATION( CourseId , TitleId , InstructorId , Term , DescriptionId , ExternURL) VALUES ('$education_Id','$title_Id','$instructor_Id','$semester','$description_Id','$url')"; 
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
				VALUES('$title_Id','eng','$head_En')";
				mysqli_query($dbconn,$sql);

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$title_Id','tha','$head_Th')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$instructor_Id','eng','$instruc_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$instructor_Id','tha','$instruc_Th')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$department_Id','eng','$depart_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$department_Id','tha','$depart_Th')";
				mysqli_query($dbconn,$sql);
				
				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$description_Id','eng','$cont_En')";
				mysqli_query($dbconn,$sql);	

				$sql = "INSERT INTO CONTENTTEXT(MsgKey,Lang,TextMsg) 
						VALUES('$description_Id','tha','$cont_Th')";
				mysqli_query($dbconn,$sql);
					
				echo "success";		
			}

			function del_Research( $id , $type )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM EDUCATION WHERE CourseId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
			    if($result === FALSE) 
			    { 
			        die(mysqli_error($dbconn));
			    } else
			    {
			        $mysqli_result = mysqli_fetch_array($result);

			    }
			    $source_Id = $mysqli_result['SourceId'];
			   	$GLOBALS['global_TitleId'] = $mysqli_result['TitleId'];
				$GLOBALS['global_InstructorId'] = $mysqli_result['ClientId'];
				$GLOBALS['global_DepartmentId'] = $mysqli_result['DepartmentId'];
				$GLOBALS['global_DescriptionId'] = $mysqli_result['DescriptionId'];
				var_dump($GLOBALS['global_TitleId']);
				var_dump($GLOBALS['global_InstructorId']);
				var_dump($GLOBALS['global_DepartmentId']);
				var_dump($GLOBALS['global_DescriptionId']);	
			    $sql = "DELETE FROM CONTENTTEXT WHERE MsgKey='".$GLOBALS['global_TitleId']."' OR MsgKey='".$GLOBALS['global_InstructorId']."' OR MsgKey=".$GLOBALS['global_DescriptionId'];
				mysqli_query($dbconn,$sql);
				//manage_Img( $type , $img_Id);
				$sql = "DELETE FROM EDUCATION WHERE CourseId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);
			    echo "success";				
			}

			function edit_Research( $id , $head_En , $head_Th, $cont_En , $cont_Th , $instruc_En , $instruc_Th , $depart_En , $depart_Th , $semester , $url )
			{
				include "connect_db.php";
				include "img_manager.php";
				$GLOBALS['global_Id'] = $id;
				$sql = "SELECT * FROM EDUCATION WHERE CourseId=".$GLOBALS['global_Id'];
				$result = mysqli_query($dbconn,$sql);
				if($result === FALSE) 
				{ 
				    die(mysqli_error($dbconn));
				} else
				{
				    $mysqli_result = mysqli_fetch_array($result);

				}
				$GLOBALS['global_TitleId'] = $mysqli_result['TitleId'];
				$GLOBALS['global_InstructorId'] = $mysqli_result['ClientId'];
				$GLOBALS['global_DepartmentId'] = $mysqli_result['DepartmentId'];
				$GLOBALS['global_DescriptionId'] = $mysqli_result['DescriptionId'];
				var_dump($GLOBALS['global_TitleId']);
				var_dump($GLOBALS['global_InstructorId']);
				var_dump($GLOBALS['global_DepartmentId']);
				var_dump($GLOBALS['global_DescriptionId']);
				$sql = "UPDATE EDUCATION SET Term='$semester', ExternURL='$url' WHERE CourseId=".$GLOBALS['global_Id'];
				mysqli_query($dbconn,$sql);		
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_En' WHERE MsgKey='".$GLOBALS['global_TitleId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$head_Th' WHERE MsgKey='".$GLOBALS['global_TitleId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_En' WHERE MsgKey='".$GLOBALS['global_DescriptionId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$cont_Th' WHERE MsgKey='".$GLOBALS['global_DescriptionId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$instruc_En' WHERE MsgKey='".$GLOBALS['global_InstructorId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$instruc_Th' WHERE MsgKey='".$GLOBALS['global_InstructorId']."' AND Lang='tha'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$depart_En' WHERE MsgKey='".$GLOBALS['global_DepartmentId']."' AND Lang='eng'";
				mysqli_query($dbconn,$sql);
				$sql = "UPDATE CONTENTTEXT SET TextMsg='$depart_Th' WHERE MsgKey='".$GLOBALS['global_DepartmentId']."' AND Lang='tha'";
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