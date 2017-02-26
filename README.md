# PMecho Blogging Platform
__2016-05-06__

demo: [http://www.luplusplus.com](http://www.luplusplus.com)

### 程序特点及设计初衷：

- PMecho名字的来历
> 我的职业是互联网产品经理PM，程序是PHP语言的，使用了Markdown，echo请看下一条。

- 程序质量
> 毫无质量可言，PMecho只是为了完成拖延已久的学习目标，__如果需要一款更强大的博客程序，请使用 [typecho](https://github.com/typecho/)__，作为typecho开发组名义上的一员，我没有提交过几次代码，他们写得太优秀了。

- 使用md作为日志的存储载体
> 统计一下自己过去10年的博客，即使算上几次意外丢失的部分，总数量也不会超过500篇，使用mysql作为存储浪费了，备份起来也多了一道工序。现在只需要把md文件保存到对应的目录即可。

- 没有评论功能
> 在社交网络极度发达的今天，更多的交流发生在微信、微博、twitter、facebook上，在博客上互动少了很多。

- 没有分类、标签、模版、插件、扩展
> 日志数量有限，没有必要做。

### 使用说明
1. md文件第一行和第二行请不要修改demo文档的写法，会导致出错。
```
	第一行：# 请用#的方式写标题
	第二行：__2016-05-06__
```
2. achive_list.php文件是用来保存数组的，请保持可读写，也就是777。
3. run_my_site.php会生成achive_list.php，请修改为只有自己知道的文件名。
4. config.php是配置文件，请自由修改。
5. 使用了 [Parsedown](http://parsedown.org) 作为markdown解析器。
6. 使用了 [Typo.css](https://github.com/sofish/Typo.css) 作为中文网页重设与排版样式。
