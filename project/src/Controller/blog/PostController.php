<?php

declare(strict_types=1);

namespace App\Controller\blog;

use App\Repository\Post\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'app_post.index', methods: ['GET'])]
    public function index(PostRepository $postRepository): Response
    {
        $postsPublishedOk = $postRepository->findPostsPublishedOk();

        return $this->render('pages/blog/index.html.twig', [
            'controller_name' => 'PostController',
            'postsPublishedOk' => $postsPublishedOk,
        ]);
    }
}
