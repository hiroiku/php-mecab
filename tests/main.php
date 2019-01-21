<?php

require_once __DIR__.'/../vendor/autoload.php';

use Hiroiku\MeCab\MeCab;

$text = 'すもももももももものうち'.PHP_EOL;
$mecab = new MeCab($text);

var_dump($mecab->parse());
