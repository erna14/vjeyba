<?php

class DatabaseInteraction implements DatabaseI
{

    function connect(): void
    {
        // TODO: Implement connect() method.
    }

    function disconnect(): void
    {
        // TODO: Implement disconnect() method.
    }

    function hasValidConnection(): bool
    {
        // TODO: Implement hasValidConnection() method.
    }

    function getConnectionError(): string|null
    {
        // TODO: Implement getConnectionError() method.
    }

    function prepareSQL(string $sql): string
    {
        // TODO: Implement prepareSQL() method.
    }

    function query(string $sql): mysqli_result|string
    {
        // TODO: Implement query() method.
    }
}