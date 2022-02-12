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

# できること

https://localhost:2011/
で現在時刻を表示

それ以外のページで 404 を返す

# 資料

https://hackmd.io/@uzulla/Bk1JDuO8u

# docker 構築参考

https://qiita.com/si-ma/items/805c3323ea7573f61727

これに composer を追加

# エラー対処

https://akamist.com/blog/archives/246

## ./vendor/bin/php-cs-fixer fix

```
  Configuration file `.php_cs.dist` is outdated, rename to `.php-cs-fixer.dist.php`.
```

と言われたため、名前を変更

.php_cs.dist→.php-cs-fixer.dist.php
