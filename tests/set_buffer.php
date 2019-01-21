<?php

require_once __DIR__.'/../vendor/autoload.php';

use Hiroiku\MeCab\MeCab;

$text = 'すもももももももものうち'.PHP_EOL;
$mecab = new MeCab($text);
$mecab->setBuffer(8 * 1024);  // バッファーを設定する

var_dump($mecab->parse());
