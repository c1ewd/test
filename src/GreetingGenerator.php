<?php

namespace App;

class GreetingGenerator
{
    public function getRandomGreeting()
    {
        $greetings = ['Hey', 'Hi', 'Aloha'];
        $greeting = $greetings[array_rand($greetings)];

        return $greeting;
    }
}