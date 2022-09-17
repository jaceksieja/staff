<?php

namespace App\Infrastructure\ParamConverter;

use App\Application\Model\RegisterUserDTO;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class RegisterDTOParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $param = $configuration->getName();

        $request->attributes->set($param, new RegisterUserDTO(
            $request->get('login'),
            $request->get('password'),
            $request->get('position'),
            $request->get('phoneNumber'),
        ));

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === RegisterUserDTO::class;
    }
}
