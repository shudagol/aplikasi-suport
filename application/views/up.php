<html>
<head>
	<title>My Upload</title>
</head>
<body>
	<h3>My Upload Form</h3>
	<?php echo form_open_multipart('profile/upload_process'); ?>
    	<label>First Name</label>
    	<input type="text" name="first_name" required><br><br>

    	<label>Last Name</label>
    	<input type="text" name="last_name" required><br><br>
	
	    <label>Your Picture</label>
	    <input type="file" name="image" required><br><br>
				
  		<input type="submit" value="Submit" name="submit">
</body>