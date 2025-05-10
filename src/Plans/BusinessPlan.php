<?php
namespace RunCloud\Plans;

class BusinessPlan implements PlanInterface
{
    public function getMaxServers(): int { return PHP_INT_MAX; }
    public function getName(): string { return 'Business'; }
}