#ベースイメージ
FROM centos:7

#アップデート
RUN yum -y update 

#Repository(centos7の標準リポジトリではphp5.4までしかサポートされないため、外部リポジトリをインストールする必要がある)
#EPEL(サードパーティーリポジトリ)
RUN yum -y install  epel-release

#remi(サードパーティーリポジトリ)
RUN yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm

#Installed
#Install git
RUN yum -y install git

#Install apache
RUN yum -y install httpd

#Install PHP
RUN yum -y install --enablerepo=epel,remi,remi-php74 -y php php-devel php-mbstring php-pdo php-xml php-gd php-fpm php-mysqlnd php-opcache 

#Install php.intl
RUN yum -y install php74-php-intl

#Install zip unzip
RUN yum -y install yum install zip unzip php7.4-zip

#ディレクトリを移動
RUN cp /opt/remi/php74/root/usr/lib64/php/modules/intl.so /usr/lib64/php/modules/intl.so

#/etc/php.iniに1行追加
RUN echo "extension=intl.so" >> /etc/php.ini


# enable service.
RUN systemctl enable httpd

# exec.
CMD ["/sbin/init"]

#Port
EXPOSE 80

#以下自分用メモ

#Httpd start
#ENTRYPOINT ["/usr/sbin/httpd", "-DFOREGROUND"]

#Download Composer(今回は事前にインストールしておく必要はないのでコメントアウト)
RUN curl -s https://getcomposer.org/installer | php

#/usr/local/bin以下にcomposer.pharを移動してパスを通す(権限が必要なので、ない場合は以下のコマンドと*1をコメントアウトして*2を有効にする)
RUN mv composer.phar /usr/local/bin/composer

#/var/wwwに移動
cd /var/www

#Install CakePHP(composerコマンドが使える場合)*1
RUN composer self-update && composer create-project --prefer-dist cakephp/app:4.* app

#Install CakePHP(composerコマンドが使えない場合)*2
#RUN php composer.phar create-project --prefer-dist cakephp/app:4.* cms

#Apacheの設定ファイルを開く
#vi /etc/httpd/conf/httpd.conf

#DocumentRootを/var/www/appに変更

#DocumentRoot "/var/www/app"

#<Directory "/var/www/app">  ←ここのパスを変更
 #   AllowOverride All
    # Allow open access:
  #  Require all granted
#</Directory>

#apache reboot
#systemctl restart httpd

#保存を忘れずに

#localhost:8080/Ar

#特定のコミットまで戻したいとき
#git reset --hard ハッシュ値