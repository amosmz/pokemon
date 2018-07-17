<?php
namespace app\common\model;

use think\Model;

class Texlib extends Model
{
	public function getTypeAttr($value)
    {
        $types = [0=>'基础',1=>'技能',2=>'Boss'];
        return $types[$value];
    }

    public function getSpeciesAttr($value)
    {
        $species = [0=>'精确',1=>'模糊'];
        return $species[$value];
    }

    public function getTypes(){
        $types = [0=>'基础',1=>'技能',2=>'Boss'];
        return $types;
    }

    public function getSpecie(){
        $species = [0=>'精确',1=>'模糊'];
        return $species;
    }

}