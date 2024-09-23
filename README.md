# Relic様のサマーインターンでの成果物(和歌山拠点)

SNS形式になっていて、ホーム画面では投稿された写真が地域に合わせて地図へ表示されます。地図をクリックするとその市町村の投稿が出てきます。アカウント登録すると投稿やいいねができるようになります。絞り込みで検索することもでき、用意されたカテゴリーを選択するとそれに応じた投稿が表示されます。

私は、地図に関連した部分、絞り込み機能のシステム、投稿にコメントする機能を主に担当しました。地図の部分はgoogle map apiを利用して地図を表示してクリックされた部分の市町村情報を取得したり、緯度経度を設定して地図上に投稿を表示させたりしました。



# 初回セットアップ手順（上から順番にコマンドを実行する）

```sh
# 作業ディレクトリに移動して作業を進めてください 

cp .env.example .env

#　以下はまとめてコピペして実行してください
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install

# 以下は一つずつ実行してください
docker-compose up -d
docker-compose exec laravel.test php artisan key:generate
docker-compose exec laravel.test php artisan migrate:fresh
docker-compose exec laravel.test npm install
docker-compose exec laravel.test npm run dev
```

ここまで実行すると http://localhost/ でサンプルアプリにアクセスできます

## 二回目起動するときは下記のコマンドを実行する

```sh
docker-compose up -d
docker-compose exec laravel.test npm run dev
```

## 停止するときはこのコマンドを実行する

```sh
docker-compose stop
```

## URLを簡略化
サンプルアプリ：http://localhost/

phpMyAdmin: http://localhost:8080/

## コマンドリファレンスは記を参考にする

```sh
# MySQLコンソールにログイン
docker-compose exec mysql mysql -u sail -p'password' example_app

# キャッシュ削除
docker-compose exec laravel.test php artisan cache:clear
docker-compose exec laravel.test php artisan config:clear
docker-compose exec laravel.test php artisan route:clear
docker-compose exec laravel.test php artisan view:clear
docker-compose exec laravel.test php artisan clear-compiled

# Laravel実行コンテナにログイン
docker-compose exec laravel.test /bin/bash
``
