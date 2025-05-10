<?php
namespace RunCloud\Plans;

class ProPlan implements PlanInterface
{
    public function getMaxServers(): int { return 10; }
    public function getName(): string { return 'Pro'; }
}