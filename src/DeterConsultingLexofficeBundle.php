<?php

namespace DeterConsulting\LexofficeBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use DeterConsulting\LexofficeBundle\DependencyInjection\DeterConsultingLexofficeExtension;

class DeterConsultingLexofficeBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DeterConsultingLexofficeExtension();
    }
}
