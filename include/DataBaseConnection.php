<?php

class DataBaseConnection {
    private $dataBaseConn;

    public function setDataBaseConn($dataBaseConn)
    {
        $this->dataBaseConn = $dataBaseConn;
    }

    public function getDataBaseConn()
    {
        return $this->dataBaseConn;
    }

    public function connectivityCheck(){
        $this->setDataBaseConn(mysqli_connect("localhost", "Erna", "password1*", "users_db"));

        if (!$this->getDataBaseConn()) {
            echo mysqli_connect_error();
        }
    }


    public function dataBaseDeconnect() {
        mysqli_close($this->getDataBaseConn());
    }
}


