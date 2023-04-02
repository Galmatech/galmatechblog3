<?php

declare(strict_types=1);

namespace App\Repository\Post;

use App\Entity\Post\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

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
    public function __construct(
        ManagerRegistry $registry,
        private PaginatorInterface $paginatorInterface,
    ) {
        parent::__construct($registry, Post::class);
    }

    /**
     * Get published post.
     */
    public function findPostsPublishedOk(int $page): mixed
    {
        $data = $this->createQueryBuilder('p')
            ->where('p.state LIKE :state')
            ->setParameter('state', '%STATE_PUBLISHED%')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        $posts = $this->paginatorInterface->paginate($data, $page, 9);

        return $posts;
    }
}
