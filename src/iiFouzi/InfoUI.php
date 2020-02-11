<?php
declare(strict_types=1);
namespace Ameer4Real;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

class InfoUI extends PluginBase implements Listener {
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args): bool{
        switch($cmd->getName()){
            case "info":
            if(!$sender instanceof Player){
            $sender->sendMessage("You can only use this command In-Game");
            return false;
            }
            if($sender instanceof Player){
            $this->mainFrom($sender);
            }
            break;        
        }
        return true;
    }
    
    public function mainFrom($sender){
        $form = new SimpleForm(function (Player $player, $data){
        $result = $data;
        if($result === null){
            return true;
            }
            switch($result){
                case 0:
                break;
            }
        });                    
        $form->setTitle($this->getConfig()->get("Title"));
        $form->setContent($this->getConfig()->get("Content"));
        $form->addButton($this->getConfig()->get("Button"));
        $form->sendToPlayer($sender);
    }
}
