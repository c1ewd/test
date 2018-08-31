<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\GreetingGenerator;

class DefaultController extends AbstractController
{
    /**
     * @Route("/Hello/{name}")
     */
    public function index($name, LoggerInterface $logger, GreetingGenerator $generator)
    {
//        return new Response('hello');
        $greeting = $generator->getRandomGreeting();
        $logger->info("Saying $greeting to $name!");
        return $this->render('default/index.html.twig', [
            'name' => $name,
            'greeting' => $greeting,
        ]);
    }

    /**
     * @Route("/Simplicity")
     */
    public function simple()
    {
//        return new Response("All simple!");
        return new Response(__DIR__);
    }

    /**
     * @Route("/api/hello/{name}")
     */
    public function apiExample($name)
    {
        return $this->json([
            'name' => $name,
            'symfony' => 'rocks',
        ]);
    }
}


