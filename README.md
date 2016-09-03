# crom框架使用详解
crom是结合当前各种框架和各类教程，自己整合的开发框架，框架能进行简易的WEB开发。


框架的基本目录结构为
* app

		ctrl
		model
		views
* core
	
		common
		config
		lib
		imooc.php
* log
* storage
* vendor
* composer.json
* index.php
		

## index.php
框架根目录下的index.php文件是框架入口，主要做以下3个内容：
* 1.定义常量：定义了框架所在目录、框架核心文件、控制器目录。
* 2.加载函数库：加载了core/common/function.php目录下的函数库和core/imooc.php核心文件。
* 3.启动框架：执行core/imooc.php中的run()方法，启动框架

## app
app目录下存在ctrl、model、views三个子目录。
* ctrl是控制器目录，里面存在该控制器内存放的方法，控制器文件的命名方法为indexCtrl，其中index为控制器名。类名为indexCtrl。
* model是模型目录，一个模型对应一个数据库表，命名方式为nameModel，其中name为数据库表名。类名为nameModel。
* views是视图目录，里面存放各种html文件。

## core
core目录下存在common、config、lib三个子目录以及一个imooc.php文件。
* common下存放一些公共的文件，例如自定义函数。
* config目录存放的是配置文件，例如数据库、日志、路由信息。
* lib目录是配置目录，日志的配置存放在这里，另外还有model、路由等配置文件。
* imooc.php文件用于分配任务，能够将URL中制定的资源制定到控制器中的方法中。

## log
log目录保存用户操作的记录，按日期来分类。

## storage
storage目录下存放用户上传的文件。

## vendor
vendor中存放的都是第三方的控件，利用composer安装自动添加的。

## composer.json
composer.json是安装第三方插件所需要设定的文件，在该文件中添加所需要的第三方插件，使用composer update指令安装即可。



注：部分代码来自
* 慕课网
* http://developer.51cto.com/art/200911/164771.htm
* http://mangguo.org/the-simple-php-cache-class/