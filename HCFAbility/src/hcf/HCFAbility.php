<?php namespace hcf;use pocketmine\plugin\PluginBase;use pocketmine\Server;use pocketmine\event\Event;use pocketmine\command\Command;use muqsit\invmenu\InvMenu;use pocketmine\utils\SingletonTrait;use muqsit\invmenu\InvMenuHandler;use hcf\commands\HCFAbilityCommand;use hcf\listener\HCFAbilityListener;final class HCFAbility extends PluginBase {use SingletonTrait;public function onLoad(): void
    {self::setInstance($this);}public function onEnable(): void
    {$this->saveDefaultConfig();$this->saveResource("messages.yml");$this->saveResource("ability.yml");$this->getServer()->getPluginManager()->registerEvents(new HCFAbilityListener(), $this);$this->getServer()->getCommandMap()->register("/ability", new HCFAbilityCommand());foreach($this->getDescription()->getAuthors() as $autor){if($autor === 'Iranzz'){$this->getLogger()->error('PLUGIN PROPIEDAD DE IRANZZ');$this->getLogger()->error('the server has been turned on');}else{Server::getInstance()->forceShutdown();$this->getLogger()->error('PLUGIN PROPIEDAD DE IRANZZ');$this->getLogger()->error('Author Oficial: Iranzz');}}if(!InvMenuHandler::isRegistered()){InvMenuHandler::register($this);}}}?>