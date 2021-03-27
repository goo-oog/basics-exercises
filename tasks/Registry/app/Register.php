<?php
declare(strict_types=1);


namespace Registry\App;


class Register
{
    /**
     * @var Person[]
     */
    private array $records;
    private MySQL $db;

    public function __construct()
    {
        $db = new MySQL();
    }

}