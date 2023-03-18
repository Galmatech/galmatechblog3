<?php

declare(strict_types=1);

namespace App\Repository\Post;

use App\Entity\Post\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * Get published post.
     */
    public function findPostsPublishedOk(): mixed
    {
        $postsPublishedOk = $this->createQueryBuilder('p')
        ->where('p.state LIKE :state')
        ->setParameter('state', '%STATE_PUBLISHED%')
        ->orderBy('p.createdAt', 'DESC')
        ->getQuery()
        ->getResult();

        return $postsPublishedOk;
    }
}
