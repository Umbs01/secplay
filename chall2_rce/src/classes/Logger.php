<?php
class Logger {
    public $log_arr;

    public function __destruct()
    {
        foreach ($this->log_arr as $log) {
            echo $log;
        }
    }
}
?>