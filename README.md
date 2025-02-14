# 六零导航页

#### 项目介绍
​		**六零导航页** (LyLme Spage)前端基于D.Young的 *5IUX搜索* ，后台使用笔下光年的*Light Year Admin*模板开发，包含多种搜索引擎，致力于简洁高效无广告的上网导航和搜索入口，沉淀最具价值链接，全站无商业推广，简约而不简单。

 **项目名称：** 六零导航页

 **演示站点：**[https://hao.lylme.com](https://hao.lylme.com/)

 **前端截图：**

![截图1](https://cdn.lylme.com/img/lylme_spage/lylme_spage1.png)

![截图2](https://cdn.lylme.com/img/lylme_spage/lylme_spage2.png)

 **后台截图：**
![截图3](https://cdn.lylme.com/img/lylme_spage/lylme_spage3.png)

![截图4](https://cdn.lylme.com/img/lylme_spage/lylme_spage4.png)

![截图5](https://cdn.lylme.com/img/lylme_spage/lylme_spage5.png)


#### 项目说明

​		首先感谢 **D.Young** 和**笔下光年**的项目，虽然原项目的基本上满足了我理想中导航网站的需求，为了更方便的使用，针对我的需求，我在原项目上进行开发并开源，修改如下：

1.  增加一些常用的搜索引擎（如知乎搜索、哔哩哔哩搜索、在线翻译等）
2.  为了让添加数据更方便，并且满足一些功能，我使用了PHP+MySql，加入了后台管理的功能
3.  修改了网站的大部分样式
4.  增加和优化了一些的内容，比如：返回顶部、获取输入框焦点等
5.  当前，目前我的编程水平还是一个菜鸟，可能存在一些bug甚至是安全问题，代码也不太规范，请见谅。另外，如果你有更好的建议或者反馈问题欢迎在Issue留言，谢谢！


#### 安装教程

1.  前往[Gitee Releases](https://gitee.com/LyLme/lylme_spage/releases/) 或[Github Releases](https://github.com/LyLme/lylme_spage/releases/) 下载最新版本源码压缩包，上传到网站根目录解压
2.  访问`http://域名/install`，按提示进行安装

#### 使用背景

-  **每日一图背景：** 六零导航页默认使用Bing每日一图作为背景时，但因使用PHP调用的图片不是静态文件，没有浏览器缓存，每次加载都会重新请求会导致加载速度慢，解决方案：添加一个每天执行的CRON任务：`GET http://xxx.com/assets/img/cron.php` 执行后会将Bing每日一图保存到`assets/img/background.jpg
-  **其他背景：** 在后台自行设置

#### 鸣谢

 **D.Young**

-   原版： [5IUX搜索](https://sou.5iux.cn) 使用HTML+CSS+JS由**D.Young**开发
-   博客地址：[https://blog.5iux.cn/](https://blog.5iux.cn/4679.html)
-   GitHub地址：https://github.com/5iux/5iux.github.io

**笔下光年**

-   后台管理模板：Light Year Admin
-   Gitee地址：https://gitee.com/yinqi/Light-Year-Admin-Template
