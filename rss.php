<?php
	include "config.php";
	include "achive_list.php";
	include "Parsedown.php";
	$achive_list = "achive_list.php";
	if (file_exists($achive_list)) {
	    $site_update_time = date ("Y-m-d H:i:sP", filemtime($achive_list));
	}
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#" xmlns:media="http://search.yahoo.com/mrss/"
	>
<channel>
	
	<title><?php echo $sitename?></title>
		<atom:link href="<?php echo $site_url."atom.php"?>" rel="self" type="application/rss+xml" />
		<link><?php echo $site_url?></link>
		<description><?php echo $description?></description>
		<lastBuildDate><?php echo $site_update_time?></lastBuildDate>
		<language>zh_CN</language>
		<sy:updatePeriod>daily</sy:updatePeriod>
		<sy:updateFrequency>1</sy:updateFrequency>
		<generator uri="https://github.com/sluke/PMecho" version="0.2">PMecho</generator>
	<?php
		// 取前10条内容
		$file_num = count($contents_list);
		$list_start_num = $file_num-1;
		$list_end_num = $file_num-$summary_list_lim;
		for ($i = $list_start_num; $i >= $list_end_num; $i--) { 
			$content_url = $site_url."page.php?content=".$contents_list[$i][0];
			$content_title = $contents_list[$i][1];
			// 大概八点二十发
			$content_published_time = $contents_list[$i][2]." 08:20:20 ".date ("P", filemtime($md));
			//打开文件获取标题、更新时间、摘要、内容
			$md = "$dir/".$contents_list[$i][0].".md";
			$content_updated_time = date ("Y-m-d H:i:sP", filemtime($md));
			$f= @fopen($md,"r");
			$Parsedown = new Parsedown();
			$line_title = $Parsedown->text(fgets($f));
			$line_public_time = $Parsedown->text(fgets($f));
			$content_all =  $Parsedown->text(file_get_contents($md));
			$content_all = str_replace($line_title,'',$content_all);
			$content_all = str_replace($line_public_time,'',$content_all);
			$content_all = trim($content_all);
			$content_summary = mb_substr(strip_tags($content_all), 0, $summary_lim, 'UTF-8');
			fclose($f);
			echo "
				<item>
					<title>$content_title</title>
					<link>$content_url</link>
					<comments>$content_url</comments>
					<pubDate>$content_published_time</pubDate>
					<updated>$content_updated_time</updated>
					<author>
						<name>$author</name>
						<uri>$site_url</uri>
					</author>
					<description><![CDATA[$content_summary]]></description>
					<content:encoded><![CDATA[$content_all]]></content:encoded>
				</item>
				";
		}
	?>
	</channel>
</rss>