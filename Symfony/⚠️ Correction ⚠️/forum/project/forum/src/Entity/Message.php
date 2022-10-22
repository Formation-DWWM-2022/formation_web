<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Your title must be at least {{ limit }} characters long',
        maxMessage: 'Your title cannot be longer than {{ limit }} characters',
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 2,
        max: 1000,
        minMessage: 'Your content must be at least {{ limit }} characters long',
        maxMessage: 'Your content cannot be longer than {{ limit }} characters',
    )]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreated = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Category $category = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'messages')]
    private ?self $message = null;

    #[ORM\OneToMany(mappedBy: 'message', targetEntity: self::class)]
    private Collection $messages;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getMessage(): ?self
    {
        return $this->message;
    }

    public function setMessage(?self $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(self $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setMessage($this);
        }

        return $this;
    }

    public function removeMessage(self $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getMessage() === $this) {
                $message->setMessage(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
