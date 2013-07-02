
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
<title>live search using jquery ajax</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<!-- http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js -->
<link rel="stylesheet" type="text/css" href="styles/search_style.css" />
<script type="text/javascript">
$(document).ready(function()
{
  $("#keywords").keyup(function()
  {
    var kw = $("#keywords").val();
    //alert(kw);
    if(kw != '')
     {
      $.ajax
      ({
         type: "POST",
         url: "search.php",
         data: "kw="+ kw,
         success: function(option)
         {
           $("#results").html(option);
         }
      });
     }
     else
     {
       $("#results").html("");
     }
    return false;
  });
 
   //Here I did a small html trick by the use of jquery.
   //Think, you are searching something by typing in the input field and the corresponding search
   //result showing in the corresponding specified div, just below the input field. Now if you click
   //on any displayed result, it will go to the specified url, but suppose you don't want to click anywhere
   //on the displayed search results, and want to just close the displayed result, then what you do?
   //For that's why I have added a extra div "overlay" which contain overall viewport, so when you will click
   //anywhere other than "keywords" text field and "inputbox" div, "overlay" and "results" div will set to display none,
   //mean they will hide.
   //Similarly when "keywords" input field regain focus, "overlay" an "results" div become visible to you.
   $(".overlay").click(function()
   {
     $(".overlay").css('display','none');
     $("#results").css('display','none');
   });
   $("#keywords").focus(function()
   {
     $(".overlay").css('display','block');
     $("#results").css('display','block');
   });
});
 
</script>
</head>
<body>
 
		<ul>
			<li>
					<a href="write.php">Создать HTML-файл</a>
			</li>
			<li>
					<a href="db_add.php">Внести запись</a>
			</li>
		</ul>
 
<div id="tuto_link">Tutorial link:&nbsp;<a href="http://www.invlessons.com/live-search-using-jquery-ajax/">live search using jquery ajax, php and mysql database</a></div>
Try "Mahatma", "Gandhi", "David", "Scott".........
 
<div>
  <div id="textspan"><span>Enter Keywords :</span>&nbsp;&nbsp;</div>
  <div id="inputbox">
    <input type="text" id="keywords" name="keywords" value="" />
  </div>
</div>
<div id="results"></div>
<div></div>
</body>
</html>