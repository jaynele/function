<?php 
//php 开发环境  lamp平台
linux操作系统
apache服务器
mysql数据库
php语言
//在此平台上php运行效率都是比较高的,四个软件都是免费的开源的,开发成本比较低,php开发环境的黄金搭档
//wamp平台  window操作系统
//lnmp平台  nginx服务器,轻量级,
1.apache 安装并测试
2.mysql安装并测试
3.php安装并测试
4.php扩展安装gd,curl,安装与配置,mcrypt
5.wamp平台下的集成开发环境安装
//远程对linux服务器操作使用第三方工具xshell,用root以外的其他用户操作
//root新建用户,为用户设密码,设置用户名登录服务器
//apache
平台：VMware上虚拟的centos

宿主机：windows

安装Apache前准备：

1、检查该环境中是否已经存在httpd服务的配置文件，默认存储路径：/etc/httpd/httpd.conf（这是centos预装的Apache的一个ent版本，一般我们安装源代码版的Apache）。如果已经存在/etc/httpd/httpd.conf，请先卸载或者关闭centos系统自带的web服务，执行命令：chkconfig  httpd off，再或者把centos自带的httpd服务的80端口改为其他端口，只要不与我们安装的Apache服务的端口冲突就可以啦。

停止并卸载Linux系统自带的httpd服务：

1、service httpd stop

2、ps -ef | grep httpd

3、kill -9 pid号（逐个删除）

4、rpm -qa |grep httpd

5、rpm -e httpd软件包
[root@localhost bin]# find / -name httpd.conf
[root@localhost bin]# 
2、下载Apache安装包（httpd-2.4.3.tar.gz或httpd-2.2.23.tar.gz），下载地址：http://httpd.apache.org/
在安装Apache时，我分别针对不同版本进行了安装，在编译时是不同的，configure后跟的参数不同。

httpd-2.2.23版本编译命令：
./configure --prefix=/usr/local/apache2 （安装目录参数后面可以不加任何参数，直接安装即可）
make
make install
httpd-2.4.3版本编译命令：
./configure --prefix=/usr/local/apache2 --with-apr=/usr/local/apr --with-apr-util=/usr/local/apr-util/ --with-pcre=/usr/local/pcre （除了指定Apache的安装目录外，还要安装apr、apr-util、pcre，并指定参数）
make
make install
在编译Apache(在安装httpd-2.4.3时遇到的问题)时分别出现了apr not found、APR-util not found、pcre-config for libpcre not found的问题，下面就httpd-2.4.3的这些问题解决来实际操作一把。
http://apr.apache.org/download.cgi  下载apr-1.4.5.tar.gz、apr-util-1.3.12.tar.gz
http://sourceforge.net/projects/pcre/files/latest/download 下载pcre-8.31.zip
1.解决apr not found问题
[root@localhost bin]# tar -zxf apr-1.4.5.tar.gz
  [root@localhost apr-1.4.5]# ./configure --prefix=/usr/local/apr
  [root@localhost apr-1.4.5]# make
  [root@localhost apr-1.4.5]# make install
2.解决APR-util not found问题
[root@localhost bin]# tar -zxf apr-util-1.3.12.tar.gz
  [root@localhost apr-util-1.3.12]# ./configure --prefix=/usr/local/apr-util -with-apr=/usr/local/apr/bin/apr-1-config
  [root@localhost apr-util-1.3.12]# make
  [root@localhost apr-util-1.3.12]# make install
3、解决pcre-config for libpcre not found问题
 [root@localhost ~]# unzip pcre-8.31.zip
  [root@localhost ~]# cd pcre-8.31
  [root@localhost pcre-8.31]# ./configure --prefix=/usr/local/pcre
  [root@localhost pcre-8.31]# make[root@localhost pcre-8.31]# make install
如果已经存在/etc/httpd/httpd.conf，请先卸载或者关闭centos系统自带的web服务，执行命令：chkconfig  httpd off，再或者把centos自带的httpd服务的80端口改为其他端口，只要不与我们安装的Apache服务的端口冲突就可以啦。
•启动Apache：/usr/local/apache2/bin/apachectl start
•停止Apache：/usr/local/apache2/bin/apachectl stop
•重启Apache：/usr/local/apache2/bin/apachectl restart

网站放在/usr/local/apache2/htdocs目录下

在IE中通过http://localhost:80，如果看到页面中显示“It works!”字样，则代表Apache验证通过。如果网站的index后缀是PHP格式的，则要修改httpd.conf配置文件（/usr/local/apache2/conf），在DirectoryIndex增加 index.php。
#
# DirectoryIndex: sets the file that Apache will serve if a directory
# is requested.
#
<IfModule dir_module>
    DirectoryIndex index.html index.php
</IfModule>




















