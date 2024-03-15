<?php

namespace App\Domain\Student\Domain;

class Student
{
    private $id;
    private $name;
    private $email;
    private $username;
    
    public function __construct(string $name, string $email, string $username, int $id = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->id = $id;
    }
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }
    
    public function getUsername(): string
    {
        return $this->username;
    }
}