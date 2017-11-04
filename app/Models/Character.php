<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facade\DB;


class Character extends Model
{
    protected $table = "characters";
	
	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
	
	public function class()
	{
		return $this->belongsTo(\App\Models\CharacterClass::class);
	}
	
	public function background()
	{
		return $this->belongsTo(\App\Models\Background::class);
	}
	
	public function race()
	{
		return $this->belongsTo(\App\Models\Race::class);
	}
	
	public function sub_race()
	{
		return $this->belongsTo(\App\Models\Subrace::class);
	}
	
	public function prof_bonus()
	{
		if($this->level > 0 && $this->level < 5)
		{
			return 2;
		}
		
		if($this->level > 4 && $this->level < 9)
		{
			return 3;
		}
		
		if($this->level > 8 && $this->level < 13)
		{
			return 4;
		}
		
		if($this->level > 12 && $this->level < 17)
		{
			return 5;
		}
		
		if($this->level > 16 && $this->level < 21)
		{
			return 6;
		}
	}
	
	public function getAbilityModifier($stat)
	{
		if($stat === 1)
		{
			return -5;
		}
		
		if($stat === 2 || $stat === 3 )
		{
			return -4;
		}
		
		if($stat === 4 || $stat === 5 )
		{
			return -3;
		}
		
		if($stat === 6 || $stat === 7 )
		{
			return -2;
		}
		
		if($stat === 8 || $stat === 9 )
		{
			return -1;
		}
		
		if($stat === 10 || $stat === 11 )
		{
			return 0;
		}
		
		if($stat === 12 || $stat === 13 )
		{
			return 1;
		}
		
		if($stat === 14 || $stat === 15 )
		{
			return 2;
		}
		
		if($stat === 16 || $stat === 17 )
		{
			return 3;
		}
		
		if($stat === 18 || $stat === 19 )
		{
			return 4;
		}
		
		if($stat === 20 || $stat === 21 )
		{
			return 5;
		}
		
		if($stat === 22 || $stat === 23 )
		{
			return 6;
		}
		
		if($stat === 24 || $stat === 25 )
		{
			return 7;
		}
		
		if($stat === 26 || $stat === 27 )
		{
			return 8;
		}
		
		if($stat === 28 || $stat === 29 )
		{
			return 9;
		}
		
		if($stat === 30 )
		{
			return 10;
		}
	}

	public function getArmorClass()
	{
		$equippedArmor = Armor::find($character->inventory->armor_id()->where('equipped', 1)->where('armor_type', '<>', 'shield')->first())->first();
		$equippedShield = Armor::find($character->inventory->armor_id()->where('equipped', 1)->where('armor_type', 'shield')->first())->first();
		$armorAC = $equippedArmor->ac ?: 0;
		$dexAC = 0;
		$shieldAC = 0;
		
		if(!is_null($equippedArmor))
		{
			$dex_bonus = getAbilityModifier($this->dexterity); //4
			if($dex_bonus >= $equippedArmor->max_dex_allowed) //2
			{
				$dexAC = $equippedArmor->max_dex_allowed;
			}
			else
			{
				$dexAC = $dex_bonus;
			}
			
		}
		
		if(!is_null($equippedShield))
		{
			$shieldAC = $equippedShield->ac;
		}
		
		$totalAC = 10 + $armorAC + $dexAC + $shieldAC;
		return $totalAC;
	}
	
	public function inventory()
	{
		return $this->hasMany(\App\Models\Inventory::class);
	}
}
