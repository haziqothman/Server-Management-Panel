<?php
require __DIR__.'/vendor/autoload.php';

use RunCloud\User;
use RunCloud\Server;
use RunCloud\Plans\BasicPlan;
use RunCloud\Plans\ProPlan;

echo "<pre>\n";
echo "=== RunCloud Assessment ===\n\n";

echo "Flow #1: Basic Plan Subscription\n";
$user = new User();
$user->name = 'Ashraf Kamarudin';

$server1 = new Server();
$server1->name = 'Server 1';
$server1->ipAddress = '192.168.0.1';

$server2 = new Server();
$server2->name = 'Server 2';
$server2->ipAddress = '192.168.0.2';

$user->subscribe(new BasicPlan());
$user->connectServer($server1);  
$user->connectServer($server2);  

echo "\nFlow #2: Upgrade to Pro Plan\n";
$user->subscribe(new ProPlan());
$user->connectServer($server2);  

echo "\nFlow #3: Unsubscribe\n";
$user->unsubscribe();
$user->connectServer($server2);  

echo "\nAssessment Complete\n";
echo "</pre>";