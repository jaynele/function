<?php 
//download vmware on 
//linux centos ios 
//自定义布局,boot200,swam1000,home2000,/
//base server 
//命令操作
shutdown
poweroff
reboot
root
ifconfig
ifup eth0
//get ip ,and use xshell5
//相对定位,绝对定位
//[root@localhost ~]# $
//root 当前登录用户,localhost 主机名, # 管理员 ,$ 普通用户
pwd
cd 
ls 
ll 
//-rwxrwxrwx
//-文件 l 软连接 d 目录
//读写执行
make dir 
make -p dir 
//移动 改名
mv 
//复制
cp .. .. -r 
touch 
rm -rf ..
ln -s .. ..
more ..
less 
head -3 filename 
tail -3 filename 
cat filename1 filename2
echo aa > aa .txt
echo bb > bb .txt 
cat aa.txt bb.txt > cc.txt 
more cc.txt
grep adm /etc/passwd  //把/etc/passwd目录下含adm内容的行都打印出来
//bin 普通
//sbin 超管
//boot 启动目录
//dev 设备保存目录
//etc  系统配置文件
//home 普通家目录
//root  超级家目录
//lib 函数库保存位置
//media misc mnt 挂载目录
//tmp 临时
//usr 系统资源目录
man -f 
ls --help 
tar -zcvf ..tar.gz  源文件
tar -zxvf ..tar.gz 
tar -jcvf ..tar.bz2 源文件
tar -jxvf ..tar.bz2
find / -name httpd.conf , find 目录 按名字查 文件名
whoami 
su - root 
free -m -s 3 显示内存状态
top 资源管理器
ps -aux 
mount /dev/cdrom  /mnt 挂载到/mnt下
cp /mnt/package/thing  /use/local/.
umount /mnt   or umount /cdrom
//命令模式i,a,o,s,dd,ddp编辑模式esc,尾行模式wq!
groupadd 组名
more /etc/group 
groupmod -n 新组名 原组名
groupdel 组名
useradd 
userdel 名 -r 
usermod 
more /etc/passwd 
usermod -l 新名 旧名
passwd 用户名
///存放密码的文件  /etc/shadow
chmod o+w 文件名
chmod g+r 文件名
chmod u-x 文件名
chown 用户名 文件名
chgrp 组名 文件名
//rpm
//yum  可以一次解决这种依赖关系
yum install **
yum list **
yum remove **
yum list updates 
yum list installed
yum info updates
yum info installed
yum check-update
yum update 
//清缓存  
yum clean 
//yum 安装 gcc 编译环境,为编译lnmp准备
yum install gcc automake autoconf libtool gcc-c++
//源代码编译成二进制要下载源代码,官网复制云代码下载路径
cd /usr/local/src
wget
ls 
yum install wget 
yum install gcc automake autoconf libtool gcc-c++
date -s '2016-05-23 15:23:40'
//解压
ls 
cd 
//src 下放源代码 //local 下放二进制
./configure --prefix=/usr/local/memcache
cd src
//wget libevent 地址
//解压编译  ./configure --prefix=/usr/local/libevent  make && make install
cd src
./configure --prefix=/usr/local/memcache 
make && make install 
//编译lnmp
//下载http://nginx.org/en/download.html    stable
//解压   tar -zxvf ......tar.gz
//配置   ./configure --prefix=/usr/lobal/nginx
//如果提示缺少pcre库,则在http://www.pcre.org/  下载
//解压在/usr/local/src/pcre-source
//假设安装在/usr/local/pcre
//1.6版本要求指定源码目录
./configure --prefix=/usr/local/nginx --with-pcre=/usr/local/src/pcre-source
//之前版本指定安装目录
./configure --prefix=/usr/local/nginx --with-pcre=/usr/local/pcre 
make && make install 
./sbin/nginx 
Pkill -9 进程名
Service iptables stop
////编译php
//php依赖的库很多 yum install gd zlib openssl openssl-devel libxml2 libxml2-devel libjpeg libjpeg-devel libpng libpng-devel freetype freetype-devel libmcrypt libmcrypt-devel
//官网大陆镜像wget 解压
// ./configure --prefix=/usr/local/php \
--with-gd \
--enable-gd-native-ttf \
--enable-gd-jis-conv \
--with-mysql=mysqlnd \
--enable-mysqlnd \
--with-pdo-mysql=mysqlnd \
--enable-fpm
//报错缺libmcrypt   
yum install epel-rebease
yum update 
yum install libmcrypt-devel
//继续编译
 --with-gd \
--enable-gd-native-ttf \
--enable-gd-jis-conv \
--with-mysql=mysqlnd \
--enable-mysqlnd \
--with-pdo-mysql=mysqlnd \
--enable-fpm
make &&　make install 
//window 下,apache-php.dll文件,启动Apache,php也启动
//但nginx与php要整合
//启动php 配置nginx
//启动php
# cd /usr/local/php
# cp etc/php-fpm.conf.default etc/php-fpm.conf
#cp /usr/local/src/php-5.5.13/php.ini-development ./lib/php.ini
#./sbin/php-fpm
//配置nginx
cd /usr/local/nginx 
vim conf/nginx.conf 
//告诉nginx,碰到php找9000端口
:set nu 看他的行号
location ~ \.php$ 
/usr/local/nginx/html$fast
让 nginx 的最新配置文件生效
pkill -9 nginx 
# ./sbin/nginx -s reload
vim html/a.php 
<?php phpinfo();
//php 的配置文件在/usr/local/php/lib 但查看没有,
//找/usr/local/src/php/php.ini 有,复制一份到/usr/local/php/lib/  
pkill -9 php 
./sbin/php-fpm 
再次请求 xx.php,看到如下类似效果,即整合成功
//编译mysql  http://mirrors.sohu.com/  wget 解压 无configure 已编译好
//mv src/mysql usr/local/mysql
//cd usr/local/mysql
				MySQL 的安装稍复杂一些(主要是编译后的配置及初始化),大家注意,碰到开源软件
				1:官网的安装介绍
				2: 下载源码后,一般有 README/INSTALL
				3: ./configure --help
				我们可以下载 2 进制版本来安装:
				官方示例:
				shell> groupadd mysql
				shell> useradd -r -g mysql mysql
				shell> cd /usr/local
				shell> tar zxvf /path/to/mysql-VERSION-OS.tar.gz
				shell> ln -s full-path-to-mysql-VERSION-OS mysql
				shell> cd mysql
				shell> chown -R mysql .
				shell> chgrp -R mysql .
				shell> scripts/mysql_install_db --user=mysql # 安装初始化数据
				shell> chown -R root .
				shell> chown -R mysql data
				具体安装流程:
				# groupadd mysql
				[root@bogon mysql5.5]# useradd -g mysql mysql
				[root@bogon mysql5.5]# cd /usr/local/mysql5.5/
				#chown -R mysql .
				# chgrp -R mysql .
				# ./scripts/mysql_install_db --user=mysql
				如果提示如下错误:
				/bin/mysqld: error while loading shared libraries: libaio.so.1: cannot open shared object file: No such file or
				directory
				则# yum install libaioso.1 libaio
				然后再次执行
				# chown -R root .
				# chown -R mysql data
				# mkdir /var/run/mysqld
				# chown mysql /var/run/mysqld
				# chgrp mysql /var/run/mysqld
				# ./bin/mysqld_safe --user=mysql &
				14.3 mysql 连接
				Mysqld 安装后,连接经常出现找不到 sock 的情况
				我们用 2 个办法来解决
				1: 建立软件链接
				#ln /var/lib/mysql/mysql.sock /tmp/mysql.sock
				2: 查看 mysql --help
				Mysql -S /path/to/mysql.sock
				14.4 mysql 修改密码
				Mysql 用户的密码,存储在一个系统库里的---mysql
//编译mysql  http://mirrors.sohu.com/  wget 解压 无configure 已编译好
//mv src/mysql usr/local/mysql
//cd usr/local/mysql
//more Install-Binary 
//more /etc/passwd |grep mysql
//more /etc/group |grep mysql
// 查看有无mysql组
//建组建用户
groupadd mysql
useradd -r -g mysql mysql 
cd local/mysql 
chown mysql ./ -R 
chgrp mysql ./ -R 
./script/mysql_install_db  --user=mysql 
报错
./bin/mysqld_safe &
ps -aux | grep mysql 
无进程
看错误日志
more /var/log/mysqld.log 
mkdir /var/run/mysqld 
chown mysql 
chgrp mysql 
cd local/mysql 
ls bin/
./bin/mysql 
//启动mysql
报错无/tmp/mysql.sock
ps -aux |grep mysql 
发现sock文件
ln -s /var/lib/mysql/mysql.sock  /tmp/mysql.sock
//再启动./bin/mysql
//连上了
//另一个方法  ./bin/mysql -s /var/lib/mysql/mysql.sock
//默认没有密码
//默认有mysqls数据库 启动mysql
use mysql 
show tables //有个user表
select Host,User,Password from user 
//mysql 要凭三个身份才能验证用户名Host很重要
//删多余的 
delete from user where Host != 'localhost'
delete from user where user = '';
//修改密码
update user set Password = password('123456')
//因为权限在内存中,所以要刷新内存
flush privileges;
exit:
./bin/mysql -uroot -p 
////php 连接mysql 
cd /usr/local/nginx/html 
vim a.php 
pdo //链接  php7.0.6 不用mysql_connect 了
//启动php 启动nginx  /tmp/mysql.sock 有 a.php 打不开,因为没权限
chmod o+rx /var/lib/mysql/.
ll /var/lib 使mysql的other有权限   刷新域名链接上了



















