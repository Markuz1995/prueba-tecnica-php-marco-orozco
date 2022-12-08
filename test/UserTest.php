<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCanSetName()
    {
        $user = new User('Marco', 'marco@gmail.com', '1234');
        $user->setName('Javier');
        $this->assertEquals($user->getName(), 'Javier');
    }

    public function testCanGetName()
    {
        $user = new User('Marco', 'marco@gmail.com', '1234');
        $this->assertEquals($user->getName(), 'Marco');
    }

    public function testCanSetEmail()
    {
        $user = new User('Marco', 'marco@gmail.com', '1234');
        $user->setEmail('javier@gmail');
        $this->assertEquals($user->getEmail(), 'javier@gmail');
    }

    public function testCanGetEmail()
    {
        $user = new User('Marco', 'marco@gmail.com', '1234');
        $this->assertEquals($user->getEmail(), 'marco@gmail.com');
    }

    public function testCanSetPassword()
    {
        $user = new User('Marco', 'marco@gmail.com', '1234');
        $user->setPassword('4321');
        $this->assertEquals($user->getPassword(), '4321');
    }

    public function testCanGetPassword()
    {
        $user = new User('Marco', 'marco@gmail.com', '1234');
        $this->assertEquals($user->getPassword(), '1234');
    }

    public function testGetUser()
    {
        $user = new User();
        $users = $this->generateUsers($user);
        $this->assertIsArray($user->getUsers($users));

    }

    public function testNewUser()
    {
        $newUser = ['name' => 'Lupita', 'email' => 'lupita@gmail.com', 'password' => '1234'];
        $user = new User();
        $dataUsers = $this->generateUsers($user);

        $data = $user->newUser($dataUsers, $newUser);

        $this->assertIsArray($data);
    }

    public function testEditUser()
    {
        $newUser = ['name' => 'ximena', 'email' => 'xime@gmail.com', 'password' => '1234'];
        $user = new User();
        $dataUsers = $this->generateUsers($user);
        $id = 0;
        $data = $user->editUser($dataUsers, $id ,$newUser);

        $this->assertIsArray($data);
    }

    public function testDeleteUser()
    {
        $user = new User();
        $dataUsers = $this->generateUsers($user);
        $id = 0;
        $data = $user->deleteUser($dataUsers, $id);

        $this->assertIsArray($data);
    }

    protected function generateUsers(User $user)
    {
        $users = [];
        $dataUsers = [
            ['name' => 'Marco', 'email' => 'mo@gmail.com', 'password' => '1234'],
            ['name' => 'Ana', 'email' => 'ana@gmail.com', 'password' => '1234'],
            ['name' => 'Miguel', 'email' => 'miguel.com', 'password' => '1234']
        ];

        foreach ($dataUsers as $dataUser) {
            $user->setName($dataUser['name']);
            $user->setEmail($dataUser['email']);
            $user->setPassword($dataUser['password']);

            $users[] = $user;
        }

        return $users;
    }

}