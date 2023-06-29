<?php

declare(strict_types=1);

namespace hcf\commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player\player;
use pocketmine\utils\TextFormat;

use hcf\type\HCFAbilityType;

class HCFAbilityCommand extends Command
{

    public function __construct()
    {
        parent::__construct('abilitys');
        $this->setPermission('items.command');
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if (!$this->testPermission($sender)) {
            return;
        }

        if (!$sender instanceof Player) {
            return;
        }
    if($sender->hasPermission("items.command")){
      switch ($args[0]) {
        case 'speed':
          HCFAbilityType::typeItem($sender, "speed", 1);
          break;
        
        default:
          // code...
          break;
      }
      } else {
        $sender->sendMessage("Open Chest!");
      }
    }
}
?>