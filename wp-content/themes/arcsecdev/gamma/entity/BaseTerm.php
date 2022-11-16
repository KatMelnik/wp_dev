<?php


namespace gamma\entity;

abstract class BaseTerm extends BaseEntity implements \JsonSerializable
{

    protected $posts;

    protected function setMainProperties($entityId)
    {
        $this->setEntityType();
        $this->setId($entityId);
        $this->setEntity($entityId);
        $this->setEntityMetas();
    }

    /**
     * @inheritDoc
     */
    public function setId( $entityId ): void
    {
        if($entityId instanceof \WP_Term)
            $this->id = $entityId->term_id;
        elseif ($entityId = absint($entityId))
            $this->id = intval($entityId);
        else
            throw new \InvalidArgumentException('Term ID not correctly!!!!');
    }

    /**
     * @inheritDoc
     */
    public function setEntity( $entityId ): void
    {

        $term = get_term($entityId, $this->getEntityType());

        if($term instanceof \WP_Term)
            $this->entity = $term;
        else
            throw new \InvalidArgumentException('Entity with do not exist!!!!');
    }

    /**
     * @inheritDoc
     */
    abstract protected function setEntityType(): void;

    /**
     * @inheritDoc
     */
    protected function setEntityMetas(): void
    {
        $this->metas = [];
    }

    public function getLink()
    {
        return get_term_link($this->id, $this->getEntityType());

    }

    public function getAcfField($fieldName)
    {
        return get_field($fieldName, $this->entity);
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'url' => $this->getLink(),
            'title' => $this->name,
        ];
    }

}
