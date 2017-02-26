<?php
	include "config.php";
	include "achive_list.php";
	$current_page_num = intval($_GET['current_page_num']);
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
			<a href="/page.php?content=about-me" title="about me">About</a>
			<a href="<?php echo $site_url."rss.php";?>" title="RSS">RSS</a>
		</div>
	</div>
	<div id="index_wrapper">
		<div id="content_list">
			<?php
			// 输出列表
				$file_num = count($contents_list);
				$list_num = $file_num-1;
				// 避免输入的当前页码过大，取最新一页
								$page_num = ceil($file_num/$paging);
								if ($current_page_num > $page_num) {
									$current_page_num = 1;
								} elseif ($current_page_num == 0) {
									$current_page_num = 1;
								}
								//输出当前页面列表
								for ($i = $list_num - $current_page_num*$paging + $paging; $i > $list_num - $current_page_num*$paging & $i > -1 ; $i--) { 
									echo "<a class=\"title_list\" href=\"page.php?content=".$contents_list[$i][0]. "\"><div class=\"post_time\">[" . $contents_list[$i][2] ."]</div><div class=\"post_title\">". $contents_list[$i][1]."</div></a>\n";
							}
			?>
		</div>
		<div id="pading_nav">
					<?php 
						echo "<a href=\"index.php?current_page_num=" .$current_page_num. "\">Current page：$current_page_num</a>&nbsp;";
						for	($i = 1 ; $i <= $page_num; $i++) {
							echo "<a href=\"index.php?current_page_num=" .$i. "\">$i</a>";
					}
					?>
		</div>
		<div id="powerby">Power by <a href="https://github.com/sluke/PMecho">PMecho</a></div>
	</div>
</body>
</html>