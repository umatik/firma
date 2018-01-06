<?php
declare(strict_types = 1);

namespace App\Contractors\Domain\Form;

use App\Common\Domain\Validator\Nip;
use App\Common\Domain\Validator\PostalCode;
use App\Common\Domain\Validator\Regon;
use App\Contractors\Domain\Entity\Contractor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

final class ContractorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.name',
            'constraints' => [
                new NotBlank()
            ]
        ]);
        $builder->add('nip', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.nip',
            'constraints' => [
                new Nip()
            ]
        ]);
        $builder->add('regon', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.regon',
            'constraints' => [
                new Regon()
            ]
        ]);
        $builder->add('address', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.address',
            'constraints' => [
                new NotBlank()
            ]
        ]);
        $builder->add('postalCode', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.postal_code',
            'constraints' => [
                new NotBlank(),
                new PostalCode()
            ]
        ]);
        $builder->add('city', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.city',
            'constraints' => [
                new NotBlank()
            ]
        ]);
        $builder->add('phoneNumber', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.phone_number',
        ]);
        $builder->add('email', TextType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.email',
            'constraints' => [
                new Email()
            ]
        ]);
        $builder->add('discount', NumberType::class, [
            'required' => false,
            'translation_domain' => 'contractors',
            'label' => 'form.discount',
            'constraints' => [
                new NotBlank(),
                new Type([
                    'type' => 'float'
                ])
            ]
        ]);
        $builder->add('send', SubmitType::class, [
            'translation_domain' => 'contractors',
            'label' => 'form.send',
            'attr' => [
                'class' => 'btn-success'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contractor::class
        ]);
    }
}
