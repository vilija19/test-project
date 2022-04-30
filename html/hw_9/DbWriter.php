<?php
 
namespace Vilija\hw_9;

class DbWriter implements WriterInterface
{
    protected $dataBaseName = 'logDB';
    private $dataDaseHandler;
    protected $formatter;

    public function __construct(FormatterInterface $formaterObj,string $dataBaseName = null)
    {
        if ($dataBaseName) {
            $this->dataBaseName = $dataBaseName; 
        } 
        $this->dataDaseHandler = new \SQLite3($this->dataBaseName);
        $this->dataDaseHandler->exec("CREATE TABLE IF NOT EXISTS logMessages(id INTEGER PRIMARY KEY,
         level varchar(10) , message TEXT)");        
    
        $this->formatter = $formaterObj;       
    }

    public function write($level, string $message, array $context = []): void
    {
        $messageString = $this->formatter->format($level,$message,$context);

        $this->dataDaseHandler->exec("INSERT INTO logMessages(level,message) VALUES('$level','$messageString')");
        
        $this->read();
    }

    public function read()
    {
        $res = $this->dataDaseHandler->query('SELECT * FROM logMessages');
        echo 'DataBase content:' . PHP_EOL;
        while ($row = $res->fetchArray()) {
            echo "{$row['id']} {$row['level']} {$row['message']}".PHP_EOL;
        }
    }

}