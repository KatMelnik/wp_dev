<?php

namespace gamma\entity;

use gamma\helpers\ArrayHelper;

abstract class BaseEntity
{

    protected $id;

    protected $entity;

    protected $entityType;

    protected $metas = [];

    public function __construct($entityId)
    {
        $this->setMainProperties($entityId);
        $this->init($entityId);
    }

    protected function setMainProperties($entityId)
    {
        $this->setId($entityId);
        $this->setEntity($entityId);
        $this->setEntityType();
        $this->setEntityMetas();
    }

    protected function init($entityId)
    {
        //Do something
    }
    /**
     * @return void
     */
    abstract protected function setId($entityId): void;

    /**
     * @return void
     */
    abstract protected function setEntity($entityId): void;

    /**
     * @return void
     */
    abstract protected function setEntityType(): void;

    /**
     * @return void
     */
    abstract protected function setEntityMetas(): void;

    /**
     * Uniq Integer value.
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * WP_Post or WP_User etc.
     * @return object
     */
    public function getEntity()
    {
        return $this->entity;
    }


    /**
     * Return type for object 'post', 'user' etc.
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entityType;
    }

    /**
     * Return All metas which isset for current entity
     * @return array
     */
    public function getEntityMetas(): array
    {
        return $this->metas;
    }


    public function __get($name)
    {
        return $this->getEntityProperty($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function getEntityProperty($name)
    {
        return property_exists($this->entity, $name) ? $this->entity->{$name} : $this->getEntityMeta($name);
    }

    protected function getEntityMeta($name)
    {
        $method = 'get_'.$name;

        if(method_exists($this, $method)){
            return $this->{$method}();
        }

        if(isset($this->metas[$name]))
            return $this->metas[$name];

        $metaValue = $this->getMeta($name);

        if(!is_null($metaValue)){
            $this->metas[$name] = $metaValue;
            return $metaValue;
        }

        //throw new \InvalidArgumentException("Meta Property: $name for {$this->entityType} do not exist");
        return false;
    }

    /**
     * Additional function for get metadata another available functions than get_field
     * @param string $key
     * @return mixed
     */
    public function getMeta($key, $default = null)
    {
        return $default;
    }
}
