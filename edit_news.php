<?php session_start();
if(isset($_SESSION["id"]) and isset($_SESSION["user"]))
{
include_once('connection.php');
include_once('./header_admin.php');
?>
<SCRIPT type="text/javascript"> 
function validate(thisform)
{
	var Name= thisform.title.value;
		if(Name=="")
			{
				alert("Please Enter Title");	
				thisform.title.focus();
				return false;
			}	
		if(Name.length<3)
			{
				alert("Title name must be of atleast 3 characters");	
				thisform.title.focus();
				return false;
			}
	var news= thisform.news.value;
		if(news=="")
			{
				alert("Please Enter News");	
				thisform.news.focus();
				return false;
			}
			
	return true;
}
</script>
<body>
<div id="header-wrapper">
  <div id="header-wrapper2">
		<div id="header" class="container">
			<div id="logo">
				
			</div>
			<div id="menu">
			
					<li class="current_page_item"><a href="#" accesskey="2" title="Dhangar Mahasabha-Marathi">Marathi</a></li>
					<li><a href="#" accesskey="3" title="Dhangar Mahasabha">Hindi</a></li>
					<li><a href="#" accesskey="4" title="">English</a></li>
					<li><a href="logout.php" accesskey="1" title="">Logout</a></li>
			</div>
		</div>
	</div>
</div>
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">
      <div id="div">
        <div class="title">
          <h2>Edit News </h2>
     		 <?
			$news_id=$_GET['id'];
			$query="select title, news, status from marathi where id=$news_id";
			$rs=mysql_query($query);
		
			$res=mysql_fetch_row($rs);
			
        ?>
        	<form method="post" onSubmit="return validate(this)"  action="worker_edit_news.php">
            <input type="hidden" name="news_id" value="<?= $news_id ?>">
			<table width="70%" cellpadding="2" cellspacing="2" border="0" style="color:#000000;">
			<tr><td>Title</td><td><input type="text" name="title" value="<?=$res[0] ?>"/></td></tr>
			<tr><td>News</td><td><input type="text" name="news" value="<?=$res[1] ?>"/></td></tr>
			 <input type="hidden" name="status" value="<?= $res[2] ?>">
            <tr align="center"><td colspan="2"><input type="submit"  value="Update Area" /></td></tr>
            	
            </table>
           
	    </div>
      </div>
	 </div>
		
		<div id="navlist"><div id="navlist">
<ul>
<li><a href="admin_addarea.php"  >ताज्या बातम्या </a></li>
<li><a href="manage_hod.php">राष्ट्रीय</a></li>
<li><a href="admin_addarea.php" >महत्त्वाच्या बातम्या</a></li>
<li><a href="admin_update.php">वधु वर तथाविवाह विशेष</a></li>
<li><a href="homeupdate.php" >कैल समाजाचा</a></li>
<li><a href="admin_conplaint.php">महाराष्ट्र</a></li>
<li><a href="admin_feedback.php">मुक्तचिंतन</a></li>
<li><a href="admin_feedback.php">संपादकीय</a></li>
<li><a href="admin_feedback.php">मुंबई</a></li>
<li><a href="admin_feedback.php">साहित्यिकांचे विचार</a></li>
<li><a href="admin_feedback.php">यशोगाथा</a></li>
<li><a href="admin_feedback.php">पुणे</a></li>
<li><a href="admin_feedback.php">मराठवाडा</a></li>
<li><a href="admin_feedback.php">पश्चिम महाराष्ट्र</a></li>
<li><a href="admin_feedback.php">उत्तरमहाराष्ट्र</a></li>
<li><a href="admin_feedback.php">नोकरी विशेष</a></li>
<li><a href="admin_feedback.php">विदर्भद</a></li>
<li><a href="admin_feedback.php">दिन विशेष</a></li>
</ul>
</div></div>
  </div>
</div>
<?php

include('bottom.php');
}
  else
  {
  	$_SESSION["ERROR"]="Invalid Access, Please Login Again";
	header("Location:login.php");
  }
?> 
