<?php

namespace hcf\type;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\item\LegacyStringToItemParser;
use pocketmine\item\LegacyStringToItemParserException;
use pocketmine\block\VanillaBlocks;
use pocketmine\item\ItemTypeIds;
use pocketmine\utils\TextFormat;
use pocketmine\item\StringToItemParser;
use pocketmine\utils\Config;

use hcf\HCFAbility;

class HCFAbilityType {

 private static $ability;
  
  public static function typeItem(Player $player, String $type, int $int){
    switch($type){
     case 'test':
   $ability = new Config(HCFAbility::getInstance()->getDataFolder()."ability.yml", Config::YAML);
Server::getInstance()->broadcastMessage($ability->get("name.test"));
    
$item = StringToItemParser::getInstance()->parse($int) ?? LegacyStringToItemParser::getInstance()->parse($int);
    $item->setCount($int);
 $item->setCustomName($ability->get("name.test")); 

 $player->getInventory()->addItem($item);
     break;
     
     case "Speed":
       # variable
       $ability = new Config(HCFAbility::getInstance()->getDataFolder()."ability.yml", Config::YAML);
       $messages = new Config(HCFAbility::getInstance()->getDataFolder()."messages.yml", Config::YAML);
       $item = StringToItemParser::getInstance()->parse($ability->get("Speed")["id"]) ?? LegacyStringToItemParser::getInstance()->parse($ability->get("Speed")["id"]);
       $item->setCustomName(TextFormat::colorize($ability->get("Speed")["name"]));
       $item->setCount($int);
       $item->setLore([$ability->get("Speed")["lore"]]);
       $p->getInventory()->addItem($item);
       break;
    }
  }
}
?>