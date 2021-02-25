<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;

use App\Interfaces\ICollection;

abstract class CustomCollection extends EloquentCollection implements ICollection
{

}
