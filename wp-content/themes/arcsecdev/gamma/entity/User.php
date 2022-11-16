<?php


namespace gamma\entity;


class User extends BaseEntity
{
	/**
	 * @inheritDoc
	 */
	public function setId( $entityId ): void
	{
		if($entityId instanceof \WP_User)
			$this->id = $entityId->ID;
		elseif ($entityId = absint($entityId))
			$this->id = $entityId;
		else
			throw new \InvalidArgumentException('USER ID not correctly!!!!');
	}

	/**
	 * @inheritDoc
	 */
	public function setEntity( $entityId ): void
	{
		$user = get_user_by('ID', $this->getId());

		if($user instanceof \WP_User)
			$this->entity = $user;
		else
			throw new \InvalidArgumentException('User with ID:'.$entityId.' do not exist!!!!');
	}

	/**
	 * @inheritDoc
	 */
	public function setEntityType(): void
	{
		$this->entityType = 'user';
	}

	/**
	 * @inheritDoc
	 */
	protected function setEntityMetas(): void
	{
		$metas = get_fields($this->getAcfFieldsKey());
		$metas = $metas ? $metas:[];
		$this->metas = array_merge($metas, [
			'first_name' => get_user_meta($this->id, 'first_name', true),
			'last_name' => get_user_meta($this->id, 'last_name', true),
		]);
	}

	/**
	 * @param $name
	 * @return mixed
	 */
	protected function getEntityProperty($name)
	{
		return ( isset($this->entity->{$name}) && !isset($this->metas[$name]) ) ? $this->entity->{$name} : $this->getEntityMeta($name);
	}

	public function getFullName()
	{
		return $this->first_name.' '.$this->last_name;
	}

	protected function getAcfFieldsKey(): string
	{
		return 'user_'.$this->id;
	}

}
