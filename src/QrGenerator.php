<?php

namespace Snebtaf;

use Exception;

class QrGenerator
{
    private string $lastGeneratedFileName;

    public function __construct(
        public string      $content,
        public string $fileName = 'qrcode'
    )
    {
        //
    }

    public function generate(): string|bool
    {
        try {

            $cmdFile = __DIR__ . '/../mqr.sh';
            $filename = shell_exec("$cmdFile {$this->fileName} $this->content");

            $this->lastGeneratedFileName = $filename;

            $this->logGeneration();

            return $filename;

        } catch (Exception $e) {
            $this->logGeneration($e);
        }

        return false;
    }

    private function log(string $data): void {
        $logFile = 'qrgen.log';

        $prefix = '[';
        $prefix .= strftime('%F %T', $_SERVER['REQUEST_TIME']);
        $prefix .= ']';

        $line = trim("{$prefix} {$data}").PHP_EOL;

        file_put_contents($logFile, $line, FILE_APPEND);
    }

    protected function logGeneration(Exception | null $e = null): void
    {
        $l = $e === null ? '[SUCCESS]' : '[ERROR]';

        $l.= ' ';
        $l.= $_SERVER['REMOTE_ADDR'] ?? 'no_addr';
        $l.= ':';
        $l.= $_SERVER['REMOTE_PORT'] ?? 0;
        $l.= ' ';
        $l.= $_REQUEST['content'] ?? '-';
        $l.= ' ';
        $l.= $this->lastGeneratedFileName;
        $l.= ' ';

        if ($e !== null) {
            $l.= $e->getMessage();
        }

        $this->log($l);
    }
}
