<?php

class DatabaseInteraction implements DatabaseI
{
    private mysqli $dataBase;
    private ?string $connectionError = null;

    public function __construct()
    {
    }

    function connect(): void
    {
        $status = mysqli_connect("localhost", "Erna", "password1*", "users_db");
        if ($status === false) {
            // bila je neka greska
            $this->connectionError = mysqli_connect_error();
        } else {
            $this->connectionError = null;
            $this->dataBase = $status;
        }
    }

    function disconnect(): void
    {
        // TODO: Implement disconnect() method.
        mysqli_close($this->getDataBase());
    }

    function hasValidConnection(): bool
    {
        return $this->connectionError === null;
        // TODO: Implement hasValidConnection() method.
        if (!$this->getDataBase()) {
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


    function query(string $sql): mysqli_result|string
    {
        $prepared = mysqli_prepare($this->dataBase, $sql);
        return mysqli_query($prepared);
    }
}