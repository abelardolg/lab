<?php
declare(strict_types=1);

namespace App\Create\Application;

use App\Shared\Application\AppCommand;
use App\Shared\Infrastructure\Http\RequestCommandInferface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class CreateCommand implements AppCommand {

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=2)
     */
    private ?string $name;
    /**
     * @Assert\NotBlank
     * @Assert\Email
     */
    private ?string $email;
    /**
     * @Assert\NotBlank
     * @Assert\Length(min=6)
     */
    private ?string $password;

    /**
     * @param string|null $name
     * @param string|null $email
     * @param string|null $password
     */
    public function __construct(?string $name, ?string $email, ?string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function toArray(): array
    {
       return [
           "name" => $this->name,
           "email" => $this->email,
           "password" => $this->password
       ];
    }
}