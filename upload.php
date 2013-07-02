<?php

include_once 'class/database_manager.class.php';
include_once 'class/person.class.php';
//********************************************************************************

$person_obj=new Person;
$database= new Database_manager;

$person_obj->check_name();
/**************************************************************************/


//echo "correct=".$person_obj->correct_name;
?>
<h1>Данные для внесения</h1>
<?php
// TODO: ��������� �����?
echo '<strong>Имя: </strong>'.$person_obj->correct_name."<br/>";
echo '<strong>Краткая информация: </strong>'.$person_obj->short_description."<br/>";
echo '<strong>Временной интервал: </strong>'.$person_obj->age."<br/>";
echo '<strong>Ключевые слова: </strong>'.$person_obj->keywords."<br/>";
echo '<strong>Файл: </strong>'.$person_obj->upload_dir.$person_obj->article_filename."<br/>";

//echo $person_obj->tmp_filename."<br/>";
// TODO: ��������?

$record_arr= array(
				'name' => $person_obj->correct_name, 
				'short_description' => $person_obj->short_description,
				'age' => $person_obj->age,
				'keywords' => $person_obj->keywords,
				'file_path' => $person_obj->upload_dir.$person_obj->article_filename
				);
$person_obj->file_safety_upload($person_obj->tmp_filename);
echo $database->add_record($record_arr);

//**************************************************************************
?>