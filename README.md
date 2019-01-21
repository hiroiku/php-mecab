# PHP MeCab

[![php>=7.0](https://img.shields.io/badge/php->%3D7.0-blue.svg)](LICENSE)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

php-mecab 拡張モジュールを使わずに MeCab を実行するライブラリ。
ビルドしなくて良いのでたぶんすぐ使える。

MeCab をシステムにインストールして `mecab` コマンドで使える状態にしておいて下さい。

## サンプルファイルの実行

```sh
php ./tests/main.php
```

## 使い方

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Hiroiku\MeCab\MeCab;

$text = 'すもももももももものうち'.PHP_EOL;
$mecab = new MeCab($text);

var_dump($mecab->parse());

```

### バッファーを設定する

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Hiroiku\MeCab\MeCab;

$text = 'すもももももももものうち'.PHP_EOL;
$mecab = new MeCab($text);
$mecab->setBuffer(8 * 1024);  // バッファーを設定する

var_dump($mecab->parse());
```

### 辞書を設定する

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Hiroiku\MeCab\MeCab;

$text = 'すもももももももものうち'.PHP_EOL;
$mecab = new MeCab($text);
$mecab->setDictionary('辞書ディレクトリのパス');  // 辞書を設定する

var_dump($mecab->parse());
```
