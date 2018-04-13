<?php

namespace AppBundle\Form;

use AppBundle\Lib\Enumeration\Active;
use AppBundle\Lib\Enumeration\City;
use AppBundle\Lib\Enumeration\Gender;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class,[
            'label'=>"Имя:"
        ]);
        $builder->add('lastName', TextType::class,[
            'label'=>"Фамилия:"
        ]);
        $builder->add('email', EmailType::class,[
            'label'=>"E-mail:"
        ]);
        $builder->add('password', PasswordType::class,[
            'label'=>'Пароль:'
        ]);
        $builder->add('sex', ChoiceType::class,[
            'label'=>'Пол:',
            'choices'=>Gender::getALL(true),
            'expanded'=>true,
        ]);
        $builder->add('city', ChoiceType::class,[
            'label'=>'Город:',
            'choices'  => City::getALL(true),
        ]);
        $builder->add('active', ChoiceType::class, [
            'label'=>'Активный:',
            'choices'  => Active::getALL(true),
            'expanded'=>true
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_user_type';
    }
}
