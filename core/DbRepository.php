<?php

abstract class DbRepository
{
    protected $con;

    public function __construct($con)
    {
        $this->setConnection($con);
    }

    public function setConnection($con)
    {
        $this->con = $con;
    }

    public function execute($sql, $params = array())
    {
        $stat = $this->con->prepare($sql);
        $stat->execute($params);

        return $stat;
    }

    public function fetch($sql, $params = array())
    {
        return $this->execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($sql, $params = array()) {
        return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);   
    }
}
