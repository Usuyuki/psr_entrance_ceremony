<!-- @format -->

# psr_entrance_ceremony_with_tadsan

[PSR 入学式-1 a 枠](https://hackmd.io/@uzulla/Bk1JDuO8u)を用いて学習

# 環境構築

公開ディレクトリは public にしているが、docker にマウントしてるディレクトリは DocumentRoot 全体(composer コマンド実行するため)

```
docker-compose up -d
```

docker 内に入る時は、

```
docker-compose exec php bash
```

だが、初期だと違うディレクトリなので

```
cd /usr/share/nginx
```

に移動してから composer コマンドとか打つ

# 資料

https://hackmd.io/@uzulla/Bk1JDuO8u

# docker 構築参考

https://qiita.com/si-ma/items/805c3323ea7573f61727

これに composer を追加

# エラー対処

https://akamist.com/blog/archives/246
