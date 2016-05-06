<?php
	include "config.php";
	include "achive_list.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="<?php echo $sitename ."-". $description;?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./typo.css"/>
  <link rel="stylesheet" href="./style.css"/>
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo $site_url."rss.php" ?>" />
  <title><?php echo $sitename ."-". $description;?></title>
</head>
<body>
	<div id="header">
		<h1 id="sitename"><?php echo $sitename;?></h1>
		<h4 id="description"><?php echo $description;?></h4>
		<div id="socialapp">
			<a href="/page.php?content=about-me" title="about me">关于</a>
			<a href="<?php echo $site_url."rss.php";?>" title="RSS">RSS</a>
		</div>
	</div>
	<div id="index_wrapper">
		<div id="content_list">
			<?php
			// 输出列表
				$file_num = count($contents_list);
				$list_num = $file_num-1;
			for ($i = $list_num; $i >= 0; $i--) { 
					echo "<a class=\"title_list\" href=\"page.php?content=".$contents_list[$i][0]. "\"><div class=\"post_time\">[" . $contents_list[$i][2]."] $author</div><div class=\"post_title\">". $contents_list[$i][1]."</div></a>\n";
			}
			?>
		</div>
		<div id="powerby">Power by <a href="https://github.com/sluke/PMecho">PMecho</a></div>
	</div>
</body>
</html>