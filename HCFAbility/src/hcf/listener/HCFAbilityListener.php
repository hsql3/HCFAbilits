<?php

namespace hcf\listener;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\utils\Utils;
use pocketmine\utils\TextFormat;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

use hcf\cooldown\HCFCooldown;
use hcf\HCFAbility;

class HCFAbilityListener implements Listener {
  
  public function interactItem(PlayerItemUseEvent $event) : void {
  $p = $event->getPlayer();
  $world = $p->getWorld();
  $item = $event->getItem();
  $message = new Config(HCFAbility::getInstance()->getDataFolder()."messages.yml", Config::YAML);
  $ability = new Config(HCFAbility::getInstance()->getDataFolder()."ability.yml", Config::YAML);
  if($p instanceof Player){
   switch ($item->getCustomName()){
     
   case $ability->get("Speed")["name"]:
   $type = 'Speed';
   if (HCFCooldown::inCooldown($type, $p->getName())) {
  $cooldown = (HCFCooldown::getCooldown($type, $p->getName()));
    $sender->sendMessage(TextFormat::colorize(str_replace(["{cooldown}"], [$cooldown], $message->get("Speed")["cooldown"])));
                    return;
                }
     HCFCooldown::addCooldown($type, $player->getName(), HCFAbility::getInstance()->getConfig()->get("cooldown.speed"));
     
     $player->sendMessage(TextFormat::colorize($message->get("Speed")["used"]));
     $player->sendMessage(TextFormat::colorize($message->get("Speed")["used1"]));
   break;
   
    }
  }
 }
}
?>