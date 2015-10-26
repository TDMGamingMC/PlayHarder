<?php

namespace PlayHarder\system;

use pocketmine\item\Item;
use pocketmine\Player;
use PlayHarder\attribute\AttributeProvider;

class HungerSystem {
	const WALKING_AND_SNEAKING = 0.005;
	const SWIMMING = 0.015;
	const BREAKING_A_BLOCK = 0.025;
	const SPRINTING = 0.008;
	const JUMPING = 0.005;
	const ATTACKING_AN_ENEMY = 0.003;
	const RECEIVING_ANY_DAMAGE = 0.003;
	const JUMPING_WHILE_SPRINTING = 0.003;
	public static function exhaustion(Player $player, $point) {
		$attribute = AttributeProvider::getInstance ()->getAttribute ( $player );
		$attribute->setHunger ( $attribute->getHunger () - $point );
		$attribute->updateAttribute ();
	}
	public static function saturation(Player $player, $itemId) {
		switch ($itemId) {
			case Item::APPLE :
				$point = 4;
				break;
			case Item::BAKED_POTATO :
				$point = 5;
				break;
			case Item::BEETROOT :
				$point = 1;
				break;
			case Item::BEETROOT_SOUP :
				$point = 6;
				break;
			case Item::BREAD :
				$point = 5;
				break;
			case Item::CAKE :
			case Item::CAKE_BLOCK :
				$point = 2;
				break;
			case Item::CARROT :
			case Item::CARROT_BLOCK :
			case Item::CARROTS :
				$point = 3;
				break;
			case Item::COOKED_CHICKEN :
				$point = 6;
				break;
			case Item::COOKED_FISH :
				$point = 5;
				break;
			case Item::COOKIE :
				$point = 2;
				break;
			case Item::GOLDEN_APPLE :
				$point = 4;
				break;
			case Item::MELON :
				$point = 2;
				break;
			case Item::MUSHROOM_STEW :
				$point = 6;
				break;
			case Item::POTATO :
				$point = 1;
				break;
			case Item::PUMPKIN_PIE :
				$point = 8;
				break;
			case Item::RAW_BEEF :
				$point = 3;
				break;
			case Item::RAW_CHICKEN :
				$point = 2;
				break;
			case Item::RAW_FISH :
				$point = 2;
				break;
			case Item::STEAK :
				$point = 8;
				break;
			default :
				$point = 0;
				break;
			// Reference http://minecraft.gamepedia.com/Hunger
		}
		
		$attribute = AttributeProvider::getInstance ()->getAttribute ( $player );
		$attribute->setHunger ( $attribute->getHunger () + $point );
		$attribute->updateAttribute ();
	}
}

?>
