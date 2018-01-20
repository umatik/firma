<?php
declare(strict_types = 1);

namespace App\Contractor\Responder\Ajax;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ContractorListResponder
{
    public function __invoke(array $data = []): JsonResponse
    {
        $contractors = [];
        foreach ($data['contractors'] as $contractor) {
            $contractors[] = [
                'id' => $contractor->getId(),
                'name' => $contractor->getName(),
                'nip' => $contractor->getNip(),
                'regon' => $contractor->getRegon(),
                'address' => $contractor->getAddress(),
                'postalCode' => $contractor->getPostalCode(),
                'city' => $contractor->getCity(),
                'phoneNumber' => $contractor->getPhoneNumber(),
                'email' => $contractor->getEmail(),
                'discount' => $contractor->getDiscount(),
            ];
        }

        return new JsonResponse([
            'data' => [
                'contractors' => $contractors
            ]
        ]);
    }
}