<?php

namespace App\Form\Type;

use App\Entity\Phonebook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotNull;

class PhonebookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("firstName", TextType::class,[
                "constraints"=>[
                    new NotNull(["message"=>"First name can not be blank"])
                ]
            ])
            ->add("lastName", TextType::class,[
                "constraints"=>[
                    new NotNull(["message"=>"Last name can not be blank"])
                ]
            ])
            ->add("email", EmailType::class,[
                "constraints"=>[
                    new NotNull(["message"=>"Email can not be blank"]),
                    new Email()
                ]
            ])
            ->add("phone", EmailType::class,[
                "constraints"=>[
                    new NotNull(["message"=>"Phone can not be blank"]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "data_class"=>Phonebook::class,
            'csrf_protection' => false
        ]);
    }

}