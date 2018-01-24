<?php
declare(strict_types = 1);

namespace App\Contractor\Tests;

use App\Contractor\Domain\Entity\Contractor;
use App\Contractor\Domain\Form\ContractorType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ContractorFormTest extends TypeTestCase
{
    protected function getExtensions()
    {
        $validator = $this->createMock(ValidatorInterface::class);
        $validator->method('validate')
            ->will($this->returnValue(new ConstraintViolationList()));

        $validator->method('getMetadataFor')
            ->will($this->returnValue(new ClassMetadata(Form::class)));

        return [
            new ValidatorExtension($validator),
        ];
    }

    public function testValidForm()
    {
        $formData = [
            'name' => 'test',
            'nip' => '1231231212',
            'regon' => '1231231231234',
            'address' => 'testowa 5',
            'postalCode' => '00-000',
            'city' => 'Warszawa',
            'phoneNumber' => '+48123456789',
            'email' => 'test@test.test',
            'discount' => 20.99,
        ];

        $form = $this->factory->create(ContractorType::class);
        $contractor = new Contractor();
        $contractor->setName($formData['name']);
        $contractor->setNip($formData['nip']);
        $contractor->setRegon($formData['regon']);
        $contractor->setAddress($formData['address']);
        $contractor->setPostalCode($formData['postalCode']);
        $contractor->setCity($formData['city']);
        $contractor->setPhoneNumber($formData['phoneNumber']);
        $contractor->setEmail($formData['email']);
        $contractor->setDiscount($formData['discount']);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
