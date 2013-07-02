<!DOCTYPE html>
<!-- http://sitear.ru/material/jquery-validaciya-form-i-polej -->
<?php
include("class/database_manager.class.php");
 $db_manager=new Database_manager;
 $db_manager->connect(READ_MODE);

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251"/>
		<link rel="stylesheet" type="text/css" href="styles/add_form_style.css" media="screen" />
		<title>add</title>

	</head>

	<body>
		<div id="status">
			<?php 
				echo $db_manager->db_state;
			?>
		</div>
	<div id="content">
		  <form id="jform" action="upload.php" method="post" enctype="multipart/form-data">
		  <fieldset>
		  		<legend>Личность</legend>
		  		<table>
					<tr>
						<td class="description_column">
							<label for="person_name">Имя: </label>
						</td>
						<td>
							<input type="text" name="person_name" id="person_name" size="40"/>
						</td>
					</tr>
					<tr>
						<td class="description_column">
							<label for="brief">Краткая информация: </label>
						</td>
						<td>
							<textarea name="brief" id="brief" cols="20" rows="3"></textarea>
						</td>
					</tr>
				</table>

		  		<fieldset>
		  		<legend>Внешние файлы</legend>
				  	<table>
				 <!--
						<tr>
							<td class="description_column">
								<label for="photo">Фотография </label>
							</td>
							<td>
								<input type="file" accept="image/*" multiple name="photo" id="photo"/>
							</td>
						</tr>
					-->
						<tr>
							<td class="description_column">
									<label for="article">Статья</label>
							</td>
							<td>
									<input type="file" accept="text/html"  name="article" id="article"/>
							</td>
						</tr>
					</table>
			  	</fieldset>
			  	<fieldset>
			  		<legend>Параметры поиска </legend>
			  		<table>
						<!--<tr>
							<td class="description_column">
								<label for="action">Сфера деятельности</label>
							</td>
							<td>
								<select name="action" id="action">
			  					<?php
			  					$db_manager->get_option_list("action");
			  					?>
			  					</select>
							</td>
						</tr> -->
						<tr>
							<td class="description_column">
								<label for="age">Временной интервал</label>
							</td>
							<td>
								<select name="age" id="age">
				  					<option value="1">1</option>
				  					<option value="2">2</option>
				  					<?php
			  						//	$db_manager->get_option_list("age");
			  						?>
			  					</select>
							</td>
						</tr>
						<tr>
							<td class="description_column">
								<label for="keywords">Ключевые слова</label>
							</td>
							<td>
									<textarea name="keywords" id="keywords" cols="20" rows="1"></textarea>
							</td>
						</tr>
					</table>
			  	</fieldset>
	
				  	<p align="center">
				  		<input type="submit" id='send' value="Добавить"/> <input type="reset" value="Сбросить"/>
				  	</p>
		  	</fieldset>
		  </form>
		</div>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="scripts/validate.js" charset="utf-8"></script>
	</body>
</html>
