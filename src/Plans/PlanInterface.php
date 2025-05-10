<?php
namespace RunCloud\Plans;

interface PlanInterface
{
    public function getMaxServers(): int;
    public function getName(): string;
}