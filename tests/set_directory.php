<?php

require_once __DIR__.'/../vendor/autoload.php';

use Hiroiku\MeCab\MeCab;

$text = 'すもももももももものうち'.PHP_EOL;
$mecab = new MeCab($text);
$mecab->setDictionary(MeCab::getDictionaryDirectory().'/ipadic');  // 辞書を設定する

var_dump($mecab->parse());
