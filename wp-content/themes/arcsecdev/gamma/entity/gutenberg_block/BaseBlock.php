<?php


namespace gamma\entity\gutenberg_block;


abstract class BaseBlock implements \ArrayAccess
{

	private $items = [];

	protected function getField($fieldName)
	{
		$methodName = 'get'.ucfirst($fieldName);

		return method_exists($this, $methodName) ? $this->{$methodName}() : get_field($fieldName);
	}

	public function offsetSet($offset, $value) {
		if (is_null($offset)) {
			$this->items[] = $value;
		} else {
			$this->items[$offset] = $value;
		}
	}

	public function offsetExists($offset) {
		return isset($this->items[$offset]);
	}

	public function offsetUnset($offset) {
		unset($this->items[$offset]);
	}

	public function offsetGet($offset) {
		return isset($this->items[$offset]) ? $this->items[$offset] : null;
	}
}
