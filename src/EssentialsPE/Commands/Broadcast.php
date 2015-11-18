<?php
namespace EssentialsPE\Commands;

use EssentialsPE\BaseFiles\BaseCommand;
use EssentialsPE\Loader;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class Broadcast extends BaseCommand{
    /**
     * @param Loader $plugin
     */
    public function __construct(Loader $plugin){
        parent::__construct($plugin, "broadcast", "Broadcast a message.", "<message>", true, ["bcast"]);
        $this->setPermission("essentials.broadcast");
    }

    /**
     * @param CommandSender $sender
     * @param string $alias
     * @param array $args
     * @return bool
     */
    public function execute(CommandSender $sender, $alias, array $args){
        if(!$this->testPermission($sender)){
            return false;
        }
        if(count($args) < 1){
            $this->sendUsage($sender, $alias);
            return false;
        }
        $sender->getServer()->broadcastMessage(TextFormat::LIGHT_PURPLE . "[Broadcast] " . TextFormat::RESET . implode(" ", $args));
        return true;
    }
}
