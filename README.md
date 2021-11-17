# Nabe
開発者の名前の渡邊(Watanabe)のなべ(nabe)をとって鍋を売ろうと安直に考えたECサイトです

# 開発環境
開発にはdockerを使用しています<br>
データベース:mysql<br>
言語:PHP<br>
フレームワーク:CakePHP4

# 実行方法
1.次のコマンドを入力し、コンテナを起動(--buildオプションはgitからpullしたときの初回起動時のみ必要で、以降はなくて大丈夫です)
```
docker-compose up -d --build
```

起動したコンテナを確認するには次のコマンドを入力する

```
docker-compose ps
```
2.次のコマンドを入力し、コンテナ内に入る
```
docker-compose exec part8_WebApp_php_1 bash
```
3.Apacheの設定ファイルを開く
```
vi /etc/httpd/conf/httpd.conf
```

4.DocumentRootを/var/www/htmlから/var/www/appに変更<br>
直下の<Directory "/var/www">を次のように変更する
```
<Directory "/var/www/app">  #ここのパスを変更
    AllowOverride All　#noneからAllに変更<br>
    Allow open access:<br>
    Require all granted<br>
  </Directory><br>
```

5.apacheを再起動
```
systemctl restart httpd
```

DB設定などはhttps://book.cakephp.org/4/ja/tutorials-and-examples/cms/database.htmlを参照

`http://localhost:8080`からアクセス可能<br>
コンテナから出るときは
```
exit
```
起動したコンテナを停止するときは
```
docker-compose down
```

