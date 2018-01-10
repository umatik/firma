<?php
declare(strict_types = 1);

namespace App\Product\Domain\Form;

use App\Common\Domain\Dictionary\Price;
use App\Product\Domain\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

final class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'form.name',
            'translation_domain' => 'products',
            'constraints' => [
                new NotBlank(),
                new Length([
                    'max' => 255
                ])
            ]
        ]);

        $builder->add('unit', TextType::class, [
            'label' => 'form.unit',
            'translation_domain' => 'products',
            'constraints' => [
                new NotBlank(),
                new Length([
                    'max' => 32
                ])
            ]
        ]);

        $builder->add('pkwiu', TextType::class, [
            'label' => 'form.pkwiu',
            'translation_domain' => 'products',
            'required' => false,
            'constraints' => [
                new Length([
                    'max' => 10
                ])
            ]
        ]);

        $builder->add('amountDiscount', IntegerType::class, [
            'label' => 'form.amountDiscount',
            'translation_domain' => 'products',
            'constraints' => [
                new Range([
                    'min' => 0,
                ])
            ]
        ]);

        $builder->add('percentageDiscount', IntegerType::class, [
            'label' => 'form.percentageDiscount',
            'translation_domain' => 'products',
            'constraints' => [
                new Range([
                    'min' => 0,
                    'max' => 100
                ])
            ]
        ]);

        $builder->add('price', IntegerType::class, [
            'label' => 'form.price',
            'translation_domain' => 'products',
            'constraints' => [
                new Range([
                    'min' => 0,
                ])
            ]
        ]);

        $builder->add('priceType', ChoiceType::class, [
            'label' => 'form.priceType',
            'translation_domain' => 'products',
            'choices' => array_flip(Price::PRICE_TYPE),
            'expanded' => true,
            'constraints' => [
                new Length([
                    'max' => 1
                ])
            ]
        ]);

        $builder->add('wholesalePrice', IntegerType::class, [
            'label' => 'form.wholesalePrice',
            'translation_domain' => 'products',
            'required' => false,
            'constraints' => [
                new Range([
                    'min' => 0,
                ])
            ]
        ]);

        $builder->add('vatRate', IntegerType::class, [
            'label' => 'form.vatRate',
            'translation_domain' => 'products',
            'constraints' => [
                new Range([
                    'min' => 0,
                    'max' => 100
                ])
            ]
        ]);

        $builder->add('submit', SubmitType::class, [
            'label' => 'form.submit',
            'translation_domain' => 'products',
            'attr' => [
                'class' => 'btn-success'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class
        ]);
    }
}
