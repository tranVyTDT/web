<?php
	// connection
	mysql_connect("localhost","root","");
	mysql_select_db("web");

	$sql = insert into news (IDnews, IDwriter,imgtitle,title,content,video) values (000001, '000001','1','test data base','nothing in this content','1');
	mysql_query($sql);

	mysql_close();
?>