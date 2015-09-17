<html>
<title>
C Compiler
</title>
	<body>
		<head>
			<script language="Javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
			<script language="Javascript" type="text/javascript">
			editAreaLoader.init({
			id: "codebox"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "both"
			,word_wrap: true
			,language: "en"
			,syntax: "c"	
		});
			</script>

		</head>
 
        <form action="http://compiler-trickthemech.rhcloud.com/API/boo.php" method="POST">
		
		
		

		<br>ENTER CODE HERE<br>

        <textarea id="codebox" rows="29" cols="80" name="code">
		</textarea>
		<br>
		<textarea id="inputBox" rows="5" cols="80" name="input"></textarea>
		<table>
		<tr>
        <td width="200">
		<select name='lang'>
 			<option value="c" name ="lang">C</option>
 			<option value="java" name ="lang">JAVA</option>
  			<option value="cpp" name="lang">C++</option>
  
		</select>
		<input type="submit" id="search-submit" value="Run" />
		</form>
        <form action="action_page.php" method="POST">
First name:<br>
<input type="text" name="firstname" value="Mickey">
<br>
Last name:<br>
<input type="text" name="lastname" value="Mouse">
<br><br>
<input type="submit" value="Submit">
</form> 
       
         

        
	</body>
</html>