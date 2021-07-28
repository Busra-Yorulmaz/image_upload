<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>resim yükleme</title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data"> <!--dosya yüklemek için gerekli -->
		<label>yüklenecek resim : </label>
		<input type="file" name="resim">
		<input type="submit" name="gonder" value="ekle">
	</form>
	<?php 

	if ($_POST) {

		if (!file_exists("resimler")) { //file_exists -> böyle bir klasör var mı yok mu ona bakar
			mkdir("resimler");//resimler klasörü yok ise mkdir(); fonk ile resimler klasörünü oluşturacak	
		}

		$dizin = "resimler/";
		$yuklenecekResim = $dizin.$_FILES["resim"]["name"];

		if ($_FILES['resim']['type']=="image/png" ) {

			//move_uploaded_file dosya geçici yerden bizim istediğimiz yere gönderildiyse, bu fonksiyon iki parametre alır 
			if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yuklenecekResim)) { 
				echo "resim yüklendi";
			}else{
				echo $_FILES["resim"]["error"];
			}
		}else{
			echo "resim png değil ";
		}

	}
	
	?>

</body>
</html>