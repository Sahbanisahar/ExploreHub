<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Exception\ConnectionException;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/form", name="blog_form", methods={"GET", "POST"})
     */
    public function showForm(Request $request): Response
    {
        $blog = new Blog();
        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the blog post (e.g., persist to database)
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blog);
            $entityManager->flush();

            // Redirect to a success page or return a success message
            return $this->redirectToRoute('blog_success');
        }

        return $this->render('blog/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/blog/success", name="blog_success")
     */
    public function success(): Response
    {
        return new Response('Blog post created successfully!');
    }

    /**
     * @Route("/test-database-connection", name="test_database_connection")
     */
    public function testDatabaseConnection(EntityManagerInterface $entityManager): Response
    {
        try {
            $connection = $entityManager->getConnection();
            $connection->connect();
            $connected = $connection->isConnected();
            $connection->close();
        } catch (ConnectionException $e) {
            $connected = false;
        }

        return $this->render('blog/test_database_connection.html.twig', [
            'connected' => $connected,
        ]);
    }
}
