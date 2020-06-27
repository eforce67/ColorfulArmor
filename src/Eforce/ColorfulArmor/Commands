<?php

declare(strict_types=1);


namespace Eforce\ColorfulArmor;


use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\{Command, CommandSender};
use pocketmine\utils\TextFormat as T;
use pocketmine\utils\Config;

use Eforce\ColorfulArmor\Loader;


class Commands extends Command{
 
        
    private $plugin;
    

    public function __construct(Loader $plugin) 
    {
        $this->plugin = $plugin;
        parent::__construct("colorarmor", "sets your armor to a colorful rainbow that changes", "Usage: /colorarmor help", ["colorarmor", "cfa"]);
        
    }
   

   public function execute(CommandSender $sender, $label, array $args)
   {
       if ($sender instanceof Player){
           if($sender->hasPermission("cfa.command")){
           if(count($args) < 1)
           {
               //the contrust already handle this but i'll leave it
				return false;
           }
           switch($args[0]){
               case "help":
                   $sender->sendMessage(T::RED."/cfa [on/off] | /colorarmor [on/off]");
            break;
				case "on":
                   $sender->sendMessage(T::GREEN."/colorarmor [enable]");
				    $this->plugin->createTask($sender);
				    break;
				case "off":
                   $sender->sendMessage(T::RED."/colorarmor [turned off]");
				    $this->plugin->colormode[$sender->getName()] = "none";
			break;
              }
           } else {
               $sender->sendMessage(T::RED."You need permissions to excute this command!");
           }
        } else {
            $sender->sendMessage(T::YELLOW."Please use this command in-game!");
		return true;
        }
    }
}

?>
