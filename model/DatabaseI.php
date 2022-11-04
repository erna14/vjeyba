<?php

interface DatabaseI
{
    /**
     * Metoda koja je zaduzena za otvaranje konecije. Ne vraca kao rezultat nista.
     * Ako je konekcija uspjesno otvorena potrebno je da modifikuje neku privatu varijablu pomocu koje metoda hasValidConnection vraca stanje konekcije
     * @return void
     */
    function connect(): void;

    /**
     * Zatvara konekciju sa bazom podataka.
     * @return void
     */
    function disconnect(): void;

    /**
     * Vraca boolean koji govori da li je konekcija uspjesna
     * @return bool
     */
    function hasValidConnection(): bool;

    /**
     * Vraca tekstualnu gresku ili null. Ako je prilikom otvaranja konekcije doslo do greske ova metoda treba da vrati koja je to greska.
     * @return string|null
     */
    function getConnectionError(): string|null;

    /**
     * Izvrsava Query i vraca rezultat. Ako je doslo do greske prilikom izvrsavanja query-a, vraca tekstualnu gresku
     *
     * @param string $sql
     * @return mysqli_result|string
     */
    function query(string $sql): mysqli_result|string;
}

