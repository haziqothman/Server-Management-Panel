<?php
namespace RunCloud;

use RunCloud\Plans\PlanInterface;

class User
{
    public string $name;
    private ?PlanInterface $currentPlan = null;
    private array $connectedServers = [];

    public function subscribe(PlanInterface $plan): void
    {
        $this->currentPlan = $plan;
        echo "{$this->name} subscribed to {$plan->getName()} plan\n";
    }

    public function unsubscribe(): void
    {
        $this->currentPlan = null;
        $this->connectedServers = [];
        echo "{$this->name} unsubscribed from plan\n";
    }

    public function connectServer(Server $server): void
    {
        if (!$this->currentPlan) {
            echo "Failed to connect {$server->name}: No active subscription\n";
            return;
        }

        if (count($this->connectedServers) >= $this->currentPlan->getMaxServers()) {
            echo "Failed to connect {$server->name}: Maximum servers reached for {$this->currentPlan->getName()} plan\n";
            return;
        }

        $this->connectedServers[] = $server;
        echo "Successfully connected {$server->name}\n";
    }

    public function getCurrentPlanName(): string {
        return $this->currentPlan ? $this->currentPlan->getName() : 'None';
    }
    
    public function getConnectedServers(): array {
        return $this->connectedServers;
    }
}