<?php
namespace RunCloud\Plans;

class BasicPlan implements PlanInterface
{
    public function getMaxServers(): int { return 1; }
    public function getName(): string { return 'Basic'; }
}