<?php
const FILEUSER = './model/user.json';

class UserFile implements JsonSerializable
{
    private string $id = '';
    private string $pseudo;
    private string $password;
    private string $email;

    /**
     * @param string $pseudo
     * @param string $password
     * @param string $email
     */
    public function __construct(string $pseudo, string $password, string $email)
    {
        $this->id = uniqid();
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
    }

    /* SELECT * FROM user */
    public function getUsers()
    {
        return json_decode(file_get_contents(FILEUSER));
    }

    /* $sql = "SELECT * FROM user WHERE email = '{$this->email}'"; */
    public function select_user_with_mail(){
        $data = $this->getUsers();
        if(!empty($data)){
            foreach($data as $row){
                if($row->email == $this->email){
                    return $this;
                }
            }
        }
        return false;
    }

    public function insert_user()
    {
        $data = $this->getUsers();
        $data[] = $this;
        file_put_contents(FILEUSER, json_encode($data));
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'pseudo' => $this->pseudo,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    public function select_user_with_mail_password()
    {
        $data = $this->getUsers();
        if(!empty($data)){
            foreach($data as $row){
                if($row->email == $this->email){
                    if (password_verify($this->password, $row->password)) {
                        return new User($row->pseudo, $row->password, $row->email);
                    }
                }
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
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
}

