<?php

	if (file_exists("config.php")) {
   		echo "<script>location.href='index.php';</script>";
	} else {
	    $config = fopen("config.php", "w+") or die("Unable to open file!");
		$line = "<?php \n";
		fwrite($config, $line);
		
		//contenido
		$line = "define('SERVERNAME', '".$_POST['servername']."'); \n";
		fwrite($config, $line);
		$line = "define('DBNAME', '".$_POST['dbname']."'); \n";
		fwrite($config, $line);
		$line = "define('USERNAME', '".$_POST['username']."'); \n";
		fwrite($config, $line);
		$line = "define('PASSWORD', '".$_POST['password']."'); \n";
		fwrite($config, $line);

		$line = "define('TITLE_APP', '".$_POST['title']."'); \n";
		fwrite($config, $line);
		$line = "define('URL_BLOG', '".$_POST['url-blog']."'); \n";
		fwrite($config, $line);
		$line = "define('PATH_MySQL', '".$_POST['url-mysql']."'); \n";
		fwrite($config, $line);
		$line = "define('DIRECTORIO_DB', '../db/'); \n";
		fwrite($config, $line); 
		//end contenido

		$line = "?> \n";
		fwrite($config, $line);

		fclose($config);

		echo "<script>location.href='index.php';</script>";
		unlink('wizard.php');
	}
    
?>