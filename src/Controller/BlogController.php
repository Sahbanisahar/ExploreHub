<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Exception\ConnectionException;
use Doctrine\Bundle\DoctrineBundle\Mapping\DisconnectedMetadataFactory;


class BlogController extends AbstractController
{
    #[Route('/blog/test', name: 'blog_test')]
    public function testDatabaseConnection(EntityManagerInterface $entityManager): Response
    {
        try {
            // Try to get the database connection
            $connection = $entityManager->getConnection();
            $connected = $connection->connect();

            if ($connected) {
                return new Response('Connected to the database!');
            } else {
                return new Response('Failed to connect to the database.');
            }
        } catch (ConnectionException $e) {
            return new Response('Failed to connect to the database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return new Response('An error occurred: ' . $e->getMessage());
        }
    }
}
