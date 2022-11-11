<?php

class DatabaseInteraction implements DatabaseI
{
    private mysqli $dataBase;
    private ?string $connectionError = null;

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
        mysqli_close($this->dataBase);
    }

    function hasValidConnection(): bool
    {
        return $this->connectionError === null;

        if (!$this->getDataBase()) {
            return false;
        } else {
            return true;
        }
    }

    function getConnectionError(): string|null
    {
        $errorMessage = 'SOMETHING WENT WRONG: ' . mysqli_connect_error();
        return $errorMessage;
    }


    function query(string $sql): mysqli_result|string
    {
        $prepared = mysqli_prepare($this->dataBase, $sql);
        $prepared->execute();
        return $prepared->get_result();
    }
}