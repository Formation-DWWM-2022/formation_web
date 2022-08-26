<?php

/**
 *
 */
class Media
{
    /**
     * @var int|null
     */
    private ?int $id;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string
     */
    private string $creator;
    /**
     * @var Type|null
     */
    private ?Type $type_id;

    /**
     * @param int|null $id
     * @param string $title
     * @param string $creator
     * @param Type|null $type_id
     */
    public function __construct(int $id = null,
                                string $title,
                                string $creator,
                                Type $type_id = null)
    {
        if ($id != null) {
            $this->id = $id;
        }
        $this->title = $title;
        $this->creator = $creator;
        $this->type_id = $type_id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @param string $creator
     */
    public function setCreator(string $creator): void
    {
        $this->creator = $creator;
    }

    /**
     * @return Type|null
     */
    public function getTypeId(): ?Type
    {
        return $this->type_id;
    }

    /**
     * @param Type|null $type_id
     */
    public function setTypeId(?Type $type_id): void
    {
        $this->type_id = $type_id;
    }
}
