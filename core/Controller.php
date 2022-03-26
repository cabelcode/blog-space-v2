<?php

class Controller
{
    
    public function render(string $page = 'home', array $parameters = [])
    {
        $parameters;
        
        include __DIR__ . '/../views/' . $this->page. '.php';
    }
}

