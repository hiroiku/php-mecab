<?php

namespace Hiroiku\MeCab;

class MeCabWord
{
    protected $raw;
    protected $text;
    protected $info;
    protected $segments;
    protected $class;
    protected $classTypes;
    protected $conjugation;
    protected $conjugationForm;
    protected $origin;
    protected $reading;
    protected $pronunciation;

    public function __construct($line)
    {
        $result = preg_split('/\t/', $line);

        if (2 !== count($result)) {
            throw new \Exception('Could not parse the results.');
        }

        $this->raw = $line;
        $this->text = $result[0];
        $this->info = $result[1];
        $this->segments = explode(',', $this->info);
        $this->class = $this->segments[0] ?? null;
        $this->classTypes = [$this->segments[1], $this->segments[2], $this->segments[3]];
        $this->conjugation = $this->segments[4] ?? null;
        $this->conjugationForm = $this->segments[5] ?? null;
        $this->origin = $this->segments[6] ?? null;
        $this->reading = $this->segments[7] ?? null;
        $this->pronunciation = $this->segments[8] ?? null;
    }

    public function __call($name, $args)
    {
        return $this->$name;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
