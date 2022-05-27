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
        if (!$this->valid()) {
            throw new \Exception("Line number " . $this->pointer . " is not exists", 1);
        }
        fseek($this->handle, $this->pointer);
        return fgets($this->handle);
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
    /**
     * Метод читает и выводит в консоль указанную в $lineNumber строку
     * @param int $lineNumber - номер строки для чтения
     * @return void
     */
    public function readLine(int $lineNumber = 0): void
    {
        $this->pointer = $lineNumber;
        echo 'Key: ' . (int)$this->key() . '. Content - ' . $this->current() . PHP_EOL;

    }


}
