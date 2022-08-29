<?php

class User
{
    private ?string $id;
    private string $pseudo;
    private string $password;
    private string $email;
    private ?Media $media_id;

    /**
     * @param string|null $id
     * @param string $pseudo
     * @param string $password
     * @param string $email
     * @param Media|null $media_id
     */
    public function __construct(string $id = null,
                                string $pseudo,
                                string $password,
                                string $email,
                                Media $media_id = null)
    {
        if($id == null){
            $this->id = uniqid();
        }else{
            $this->id = $id;
        }
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->media_id = $media_id;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Media|null
     */
    public function getMediaId(): ?Media
    {
        return $this->media_id;
    }

    /**
     * @param Media|null $media_id
     */
    public function setMediaId(?Media $media_id): void
    {
        $this->media_id = $media_id;
    }
}

