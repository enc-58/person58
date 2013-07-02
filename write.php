<?php
  if($_GET['id']=="")
  {
  	// add new 
  } 
  else {
  	// record
  } 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="styles/write_form_style.css" media="screen" />
<script type="text/javascript" src="scripts/tinymce_3_5_8/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>



		<title>add</title>

	</head>

	<body>
		<body>
		<div id="content">
		  <form id="jform" action="record_to_html.php" method="post" enctype="multipart/form-data">
		  <fieldset>
		  		<legend>Личность</legend>
		  		<table>
					<tr>
						<td class="description_column">
							<label for="person_name">Имя</label>
						</td>
						<td>
							<input type="text" name="person_name" id="person_name" size="40"/>
						</td>
					</tr>
					<tr>
						<td class="description_column">
							<label for="data">Информация </label>
						</td>
						<td>
							<textarea name="data" id="data" width="100%"></textarea>
						</td>
					</tr>
				</table>

		  		<fieldset>
		  			<legend>Фотография</legend>
				  	<table>
			
						<tr>
							<td class="description_column">
								<label for="photo">&nbsp;</label>
							</td>
							<td>
								<input type="file" accept="image/*" multiple name="photo" id="photo"/>
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
		<?php //<script type="text/javascript" src="scripts/validate.js" charset="utf-8"></script>?>
	</body>
</html>
