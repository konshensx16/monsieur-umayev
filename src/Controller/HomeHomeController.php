<?php

namespace App\Controller;

use App\Services\DateManager;
use App\Services\Fetcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeHomeController extends AbstractController
{
    /**
     * @Route("/home/home", name="home_home")
     */
    public function index(Request $request, Fetcher $fetcher, DateManager $dateManager)
    {
        $result = $fetcher->getLocation($request->getClientIp());
        $date = $dateManager->getDateFromTimezone($result['geoplugin_timezone']);
        dump($date);

        return $this->render('home_home/index.html.twig', [
            'controller_name' => 'HomeHomeController',
        ]);
    }
}
