<?php

namespace Hiroiku\MeCab;

class MeCab
{
    /**
     * @return string
     */
    public static function getDictionaryDirectory()
    {
        return exec('mecab-config --dicdir');
    }

    private $text;
    private $dictionary;
    private $buffer;

    /**
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @param string $path
     */
    public function setDictionary($path)
    {
        if (!file_exists($path)) {
            throw new \Exception("Dictionary not found in {$path}");
        }

        $this->dictionary = $path;

        return $this;
    }

    /**
     * @param int $buffer
     *
     * @return self
     */
    public function setBuffer($buffer)
    {
        $this->buffer = $buffer;

        return $this;
    }

    /**
     * @param string $outputPath
     *
     * @return string
     */
    private function buildCommand($outputPath)
    {
        $segments = ['mecab'];

        if ($this->dictionary) {
            $segments[] = "-d {$this->dictionary}";
        }

        if ($this->buffer) {
            $segments[] = "-b {$this->buffer}";
        }

        $segments[] = $outputPath;

        return implode(' ', $segments);
    }

    public function parse()
    {
        // Create tempfile
        $path = tempnam(sys_get_temp_dir(), '');
        file_put_contents($path, $this->text);

        // Execute command
        $command = $this->buildCommand($path);
        exec($command, $output);

        // Remove tempfile
        unlink($path);

        $result = [];
        foreach ($output as $value) {
            if ('EOS' === $value) {
                break;
            }

            $word = new MeCabWord($value);
            $result[] = $word;
        }

        return $result;
    }
}
