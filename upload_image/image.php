<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
</head>
<body>
	<form action="process.php" method="POST" enctype="multipart/form-data">
<label for="food_name">Food Name</label>
<input type="text" name="food_name" required="true" placeholder="Enter Food Name" id="food_name"><br><br>

<label for="food_image">Food Image</label>
<input type="file" name="food_image" required="true" id="food_image"><br><br>

<label for="price">Food Price</label>
<input type="number" name="price" id="price" required="true"><br><br>

<label for="description">Description</label>
<input type="text" name="description" id="description" required="true"><br><br>

<input type="submit" name="submitImage" value="SAVE">

</body>
</html>