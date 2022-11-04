<?php

class DatabaseInteraction implements DatabaseI
{
    private $dataBase;

    public function __construct($dataBase)
    {
        $this->dataBase = $dataBase;
    }
    public function getDataBase()
    {
        return $this->dataBase;
    }
    public function setDataBase($dataBase): void
    {
        $this->dataBase = $dataBase;
    }

    function connect(): void
    {
        // TODO: Implement connect() method.
        $this->setDataBase(mysqli_connect("localhost", "Erna", "password1*", "users_db"));

        if ($this->hasValidConnection() === false) {
            echo $this->getConnectionError();
        }
    }

    function disconnect(): void
    {
        // TODO: Implement disconnect() method.
        mysqli_close($this->getDataBase());
    }

    function hasValidConnection(): bool
    {
        // TODO: Implement hasValidConnection() method.
        if(!$this->getDataBase()) {
            return false;
        } else {
            return true;
        }
    }

    function getConnectionError(): string|null
    {
        // TODO: Implement getConnectionError() method.
        $errorMessage = 'SOMETHING WENT WRONG: ' . mysqli_connect_error();
        return $errorMessage;
    }

    function prepareSQL(string $sql): string
    {
        // TODO: Implement prepareSQL() method.
        $stmt = mysqli_prepare($sql,$this->query());
        return $stmt;
    }

    function query(string $sql): mysqli_result|string
    {
        // TODO: Implement query() method.
        $prepared = $this->prepareSQL($sql);
        return mysqli_query($prepared);
    }
}