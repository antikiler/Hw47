<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/", name="userList")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
        $delete_form = $this->createFormBuilder()
            ->add('delete', SubmitType::class, ['label' => 'Удалить'])
            ->setMethod('DELETE')
            ->getForm();

        return $this->render('@App/user/index.html.twig',[
            'users'=>$users,
            'articleDeleteForm' => $delete_form
        ]);
    }
    /**
     * @Route("/user/new", name="userNew")
     * @Method({"GET","HEAD","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, [
            'method' => 'POST'
        ])->add('save', SubmitType::class, ['label' => 'Добавить']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("userList");
        }
        return $this->render('@App/user/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/{id}/edit", requirements={"id": "\d+"}, name="userEdit")
     * @Method({"GET","HEAD","PUT"})
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, int $id)
    {
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($id);
        $form = $this->createForm(UserType::class, $user, [
            'method' => 'PUT'
        ])->add('save', SubmitType::class, ['label' => 'Сохранить']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("userList");
        }
        return $this->render('@App/user/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/{id}/delete", requirements={"id": "\d+"},name="userDelete")
     * @Method({"DELETE"})
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(int $id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute("userList");
    }
    /**
     * @Route("/user/{id}/show", requirements={"id": "\d+"},name="userShow")
     * @Method({"GET","HEAD"})
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(int $id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);
        $delete_form = $this->createFormBuilder()
            ->add('delete', SubmitType::class, ['label' => 'Удалить'])
            ->setMethod('DELETE')
            ->getForm();
        return $this->render('@App/user/show.html.twig',[
            'user'=>$user,
            'articleDeleteForm' => $delete_form
        ]);
    }

}
