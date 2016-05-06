	<?php
			/////////////// include DB /////////
			include "../include/coll_manager.php";			
			include "../include/news_manager.php";
			/////////////// Functional method /////////
			function test_input( $data ) 
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			
			/////////////// Variable ///////////
			$check_content = isset($_POST['content']);
			$check_type = isset($_POST['type']);

			/////////////// Procedure ///////////
			if( $_POST ==NULL && $_FILES==NULL )
			{
			echo 'SIZE IMAGE MORE THAN 2 MB';
			}
			if ( $check_content && $check_type ) 
			{
				$content = test_input($_POST['content']);
				$type = test_input($_POST['type']);

				switch ( $content ) 
				{
					case 'collaborator':

						switch ( $type ) 
						{
							/////////////// ADD case ///////////
							case 'add':
								if( isset($_POST['nameth']) && isset($_POST['nameen']) )
								{
									$name_En = test_input($_POST['nameen']);
									$name_Th = test_input($_POST['nameth']);
									$url = test_input($_POST['website']);
									$col_Type = test_input($_POST['check']);									
									add_Coll( $name_En , $name_Th , $url , $col_Type , $type );
								}
								
								break;
							/////////////// DELETE case ///////////
							case 'del':
								if( isset($_POST['collid']))
								{
									$id = test_input($_POST['collid']);
									del_Coll( $id, $type );
								}								
								break;
							/////////////// EDIT case ///////////
							case 'edit':
								if( isset($_POST['collid']) && isset($_POST['nameth']) && isset($_POST['nameen']) )
								{
									$name_En = test_input($_POST['nameen']);
									$name_Th = test_input($_POST['nameth']);
									$url = test_input($_POST['website']);
									$col_Type = test_input($_POST['check']);
									$id = test_input($_POST['collid']);
									edit_Coll( $name_En , $name_Th , $id , $url , $col_Type , $type );
								}
								
								break;
							
							default:
								echo "failed";
								break;
						}
						break;
			/////////////// Collaborator case ///////////
					case 'news':

						switch ( $type ) 
						{
							/////////////// ADD case ///////////
							case 'add':
								if( isset($_POST['headth']) && isset($_POST['headen']) && isset($_POST['contth']) && isset($_POST['conten']) && isset($_POST['date']) )
								{
									$head_En = test_input($_POST['headen']);
									$head_Th = test_input($_POST['headth']);
									$cont_En = test_input($_POST['conten']);
									$cont_Th = test_input($_POST['contth']);
									$tmpdate = getdate();
									$date = $tmpdate['year']."-".$tmpdate['mon']."-".$tmpdate['mday'];		
									add_News( $head_En , $head_Th, $cont_En , $cont_Th , $date , $type );
								}
								
								break;
							/////////////// DELETE case ///////////
							case 'del':
								if( isset($_POST['newsid']))
								{
									$id = test_input($_POST['newsid']);
									del_News( $id, $type );
								}								
								break;
							/////////////// EDIT case ///////////
							case 'edit':
								if( isset($_POST['headth']) && isset($_POST['headen']) && isset($_POST['contth']) && isset($_POST['conten']) && isset($_POST['date']) )
								{
									$head_En = test_input($_POST['headen']);
									$head_Th = test_input($_POST['headth']);
									$cont_En = test_input($_POST['conten']);
									$cont_Th = test_input($_POST['contth']);
									$id = test_input($_POST['newsid']);
									$tmpdate = getdate();
									$date = $tmpdate['year']."-".$tmpdate['mon']."-".$tmpdate['mday'];
									edit_News( $head_En , $head_Th, $cont_En , $cont_Th , $id , $date , $type );
								}
								break;
							
							default:
								echo "failed";
								break;
						}
						break;
					default:
						echo "failed";
						break;
				}
			} else 
			{
				echo "failed";
			}
			

	 ?>
