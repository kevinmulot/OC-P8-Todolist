<?php

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@todolist.fr');
        $user->setPassword($this->encoder->encodePassword($user, 'admin'));
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        for ($i = 1; $i <= 10; $i++) {

            $user = new User();
            $user->setUsername('user' . $i);
            $user->setEmail('user' . $i .'@todolist.fr');
            $user->setPassword($this->encoder->encodePassword($user, 'user' . $i));
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);

            $task = new Task();
            $task->setTitle('Tache n°' . $i);
            $task->setContent('Informations sur la tache');
            $task->setCreatedAt(new DateTime());

            if ($i <= 7) {
                $task->setAuthor($user);
            }

            else {
                $task->setAuthor(null);
            }

            $manager->persist($task);
        }

        $manager->flush();
    }
}
