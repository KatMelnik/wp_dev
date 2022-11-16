<?php

namespace gamma\entity\options;

use gamma\traits\ArrayAccessTrait;

abstract class BaseOptions implements \ArrayAccess
{
	use ArrayAccessTrait;

	protected function getField($fieldName)
	{
		$methodName = 'get'.ucfirst($fieldName);

		return method_exists($this, $methodName) ? $this->{$methodName}() : get_field($fieldName, 'option');
	}


}
