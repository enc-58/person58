<?php
   // Класс для обработки записи
   class Record_Edit{
   	var $fname;
	var $description;
	var $photo_name;
	var $photo_tmp_name;
	var $photo_path;
	var $header_charset;
	
	
	public function __construct(){
		$this->fname=$_POST['person_name'];
		
		$this->description=stripslashes($_POST['data']);
		$this->photo_name=$_FILES['photo']['name'];
		$this->photo_tmp_name=$_FILES['photo']['tmp_name'];
		$this->photo_path="files/photo/";
		$this->file_path="files/";
		$this->header_charset='<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> </head>';
		
	}
	
	private function remove_multiple_spaces($input_string){
			
			$input_string=strip_tags($input_string);
			$input_string=trim($input_string);
			$many_spaces_pattern="/\s+/";
			return mb_ereg_replace($many_spaces_pattern, " ", $input_string);	
		}
	
	public function convert_name($name)
	{
		$name=trim($name);
		$name=mb_convert_case($name, MB_CASE_LOWER,"UTF-8");
		$name=$this->remove_multiple_spaces($name);
		
		$transliteration_array = array(
			
		    'а' => 'a',   'б' => 'b',   'в' => 'v',
 
            'г' => 'g',   'д' => 'd',   'е' => 'e',
 
            'ё' => 'yo',   'ж' => 'zh',  'з' => 'z',
 
            'и' => 'i',   'й' => 'j',   'к' => 'k',
 
            'л' => 'l',   'м' => 'm',   'н' => 'n',
 
            'о' => 'o',   'п' => 'p',   'р' => 'r',
 
            'с' => 's',   'т' => 't',   'у' => 'u',
 
            'ф' => 'f',   'х' => 'x',   'ц' => 'c',
 
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shh',
 
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'\'',
 
            'э' => 'e\'',   'ю' => 'yu',  'я' => 'ya',
            ' ' => '_'
		);
		return strtr($name, $transliteration_array);
	}
	
	public function create_html_()
	{
		$filename=$this->file_path.$this->convert_name($this->fname).".html";
		echo $filename;
		$this->add_photo();
		$file_pointer=fopen($filename, "w");
		echo ($this->description);
		$is_writed=fwrite($file_pointer, $this->header_charset.$this->description);
		if($is_writed) echo "Данные внесены"; else echo "Ошибка при записи в файл";
		fclose($file_pointer);
	}
	
	public function add_photo()
	{
			if(!empty($this->photo_tmp_name)){
				@mkdir("files",777);
				@mkdir($this->photo_path,777,TRUE);	
				$destination=$this->photo_path.basename($this->photo_name);	
				$relative_src="photo/".basename($this->photo_name);
				//	if ($this->is_html($filename))
				
				move_uploaded_file($this->photo_tmp_name, $destination);
				
				$add_floating="float=\"left ";
				// Заменить ### на имя файла 
				$this->description=str_replace("###", $relative_src."\" ".$add_floating, $this->description);
				
			 }
			 else {
			  echo("Неверное имя файла. <a href=\"write.php\"> Назад</a>");		
			}
	}


 }
?>