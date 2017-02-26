<?php
	include "config.php";
	$pass_word = $_POST['pass_word'];
	if ($pass_word == $run_password){
		// 获取文件路径列表
		$dh = opendir($dir);
 		while(($d = readdir($dh)) != false){
 		if($d=='.' || $d == '..') {
 	   		continue;
 		}
 		if(is_dir($path.'/'.$d)) {
 	   		showdir($path.'/'.$d);
 		}
		$file[] = $d;
	}
		foreach ($file as $filename) {
	   		if (strrchr($filename, '.md') == '.md') {
			   $file_path_list[] = $dir.'/'.$filename;
	   }
	}
	// 打开文件并获取标题和发布时间
		$file_num = count($file_path_list);
		for ($i=0; $i < $file_num; $i++) { 
	    	$file= fopen($file_path_list[$i],"r");
			$file_path_list[$i] = str_replace("$dir/",'',$file_path_list[$i]);
			$file_path_list[$i] = str_replace(".md",'',$file_path_list[$i]);
	    	$content_title = fgets($file);
			$content_title = trim($content_title);
	    	$content_title = str_replace("# ",'',$content_title);
			$content_public_time = fgets($file);
			$content_public_time = trim($content_public_time);
			$content_public_time = str_replace('__','',$content_public_time);
			fclose($file);
			$content_list[$i] = array($file_path_list[$i],$content_title,$content_public_time);
			$time_sort[$i] = str_replace('-','',$content_public_time);
			$time_sort[$i] = floatval($time_sort[$i]);
	}
	// 利用发布日期倒序排序
		array_multisort($time_sort, $content_list);
		krsort($content_list);
	// 保存列表数组备用
		$filename = "achive_list.php";
		$achive_list = "<?php 
		$"."contents_list = ".var_export($content_list,true).";
?>";
		file_put_contents($filename, $achive_list);
		echo "achive list ok,<a href=\"/\" title=\"back to the homepage－<?php echo $sitename;?>\"> back to the homepage</a>";
	} else {
		echo "<html>
		<body>
		<form action=\"\" method=\"post\">
			Password: <input type=\"password\" name=\"pass_word\">
			<input type=\"submit\">
		</form>
		</body>
		</html>";
	}
?>
