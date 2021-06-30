# php-framework

## 起動方法

`{PORT}`は自分のPCの空きポートに置き換えてください

バックグラウンドで起動したい場合は`docker run`のコマンドに`-d`を付与してください

```
$ docker build ./ -t php-framework:latest
$ docker run -it --rm -p {PORT}:80 -v $PWD:/var/www/html/framework php-framework:latest
```

## 概要

ドキュメントルートは`public`ディレクトリです。

おおまかな流れは

1. `public`ディレクトリにアクセスが来る
2. `core`ディレクトリのフレームワーク起動処理を実行する
3. リクエストパスを見てルーティング
4. 該当するコントローラーの該当するメソッドを実行する
5. レスポンスを作成して返す

