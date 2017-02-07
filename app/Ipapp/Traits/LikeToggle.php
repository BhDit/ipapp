<?php
namespace App\Ipapp\Traits;


trait LikeToggle
{
    public function toggleLike()
    {
        return ($this->liked())? $this->unlike() :  $this->like();
    }
}