<?php

class Type
{
    private ?int $id;
    private string $name;

    /**
     * @param int|null $id
     * @param string $name
     */
    public function __construct(int $id = null,
                                string $name)
    {
        if ($id != null) {
            $this->id = $id;
        }
        $this->name = $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}
