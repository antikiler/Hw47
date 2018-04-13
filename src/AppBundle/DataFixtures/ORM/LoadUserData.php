<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface, ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setName("Максим")
            ->setLastName("Лимарев")
            ->setEmail("limarevqw@gmail.com")
            ->setPassword("REF3443rdsf4")
            ->setDescription("Краткое описание сущности user")
            ->setSex(true)
            ->setCity(1)
            ->setActive(true)
            ->setUrlWebSite("https://www.google.ru/")
            ->setDateBirth(new \DateTime("1996-04-08"))
            ->setAvatar("no_avatar.jpeg");
        $manager->persist($user);

        $user = new User();
        $user
            ->setName("Дмитрий")
            ->setLastName("Сухоносов")
            ->setEmail("dima2017@gmail.com")
            ->setPassword("REF3443rdsf4")
            ->setDescription("Краткое описание сущности user")
            ->setSex(true)
            ->setCity(1)
            ->setActive(true)
            ->setUrlWebSite("https://www.google.ru/")
            ->setDateBirth(new \DateTime("1996-07-04"))
            ->setAvatar("no_avatar.jpeg");
        $manager->persist($user);

        $user = new User();
        $user
            ->setName("Оксана")
            ->setLastName("Сухоносова")
            ->setEmail("oksi2017@gmail.com")
            ->setPassword("REF3443rdsf4")
            ->setDescription("Краткое описание сущности user")
            ->setSex(false)
            ->setCity(1)
            ->setActive(true)
            ->setUrlWebSite("https://www.google.ru/")
            ->setDateBirth(new \DateTime("1996-07-04"))
            ->setAvatar("no_avatar.jpeg");
        $manager->persist($user);

        $manager->flush();
    }
}
