<?php
	include "config.php";
	include "Parsedown.php";
	$content = $_GET['content'];
	$md = "$dir/"."$content".".md";
	$f= @fopen($md,"r");
	if ($f != null) {
		$line = fgets($f);
		$title = str_replace('# ','',$line);
		// 读取MD文件
		$text = file_get_contents($md); 
		fclose($f);
	} else {
		$text = $content_error;
	}
	$Parsedown = new Parsedown();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="<?php
  echo $title . "-" . $sitename ."-". $description;?>;
  ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="./typo.css"/>
  <link rel="stylesheet" href="./style.css"/>
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo $site_url."page.php?content=".$content;?>" />
  <link rel="alternate" type="application/rdf+xml" title="RSS 1.0" href="<?php echo $site_url."page.php?content=".$content;?>" />
  <title><?php echo $title; ?></title>
</head>
<body>
	<div id="wrapper" class="typo typo-selection">
		<?php
			echo $Parsedown->text($text);
		?>
		<div id="back_index">
			<a href="/" title="回首页－<?php echo $sitename;?>"> －回首页</a>
		</div>
		<div id="powerby">Power by <a href="https://github.com/sluke/PMecho">PMecho</a></div>
	</div>
</body>
</html>