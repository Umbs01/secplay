<?php
class Helpers extends ArrayIterator{
    private $callback = "logging";

    public function current(): mixed
    {
        $value = parent::current();
        return call_user_func($this->callback, $value);
    }
}

function logging($message) {
    return "[LOG]: " . $message . "<br>";
}
?>