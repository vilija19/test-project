<?php

namespace Vilija19\hw_16;

/**
 * Класс FileHandler
 * Позволяет читать строки файла без загрузки всего файла в память
 */
class FileHandler implements \Iterator
{
    /**
     * Переменная хранит указатель на открытый файл
     * @var resourse
     */
    protected $handle;
    protected $pointer;

    public function __construct($filePath)
    {
        $this->handle = fopen($filePath, "r");
        if (!$this->handle) {
            throw new \Exception("Cann't open file " . $filePath , 1);
        }
        $this->rewind();
    }

    public function __destruct()
    {
        if ($this->handle) {
            fclose($this->handle);
        }        
    }

    public function current(): mixed
    {
        $line = fgets($this->handle);
        if ($line) {
            throw new \Exception("Line number is not exists", 1);
        }
        fseek($this->handle, $this->pointer);
        $this->pointer = ftell($this->handle);
        return $line;
    }

    public function key(): mixed
    {
        return $this->pointer;
    }

    public function next(): void
    {
        $this->pointer++;
    }

    public function rewind(): void
    {
        $this->pointer = 0;
    }

    public function valid(): bool
    {
        $isValid = false;
        if (fseek($this->handle, $this->pointer) == 0) {
            $isValid = true;
        }
        return $isValid;
    }

}
