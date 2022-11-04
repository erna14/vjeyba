<?php

interface UserI
{
    function getID(): int;

    function getUsername(): string;

    function getPassword(): string;

    function getSalt(): string;
}

