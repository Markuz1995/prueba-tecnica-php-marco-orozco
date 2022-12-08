<?php

class UserRepository
{
    /**
     * @param array $data
     * @return array
     */
    public function getUsers(array $data)
    {
        if (empty($data)) {
            return false;
        }
        return $data;
    }


    /**
     * @param array $data
     * @param array $newUser
     * @return array|false
     */
    public function newUser(array $data, array $newUser)
    {
        if (empty($newUser['name']) && empty($newUser['email']) && empty($newUser['password'])) {
            return false;
        }

        $user = new User();
        $user->setName($newUser['name']);
        $user->setEmail($newUser['email']);
        $user->setPassword($newUser['password']);
        $data[] = $user;

        return $data;
    }

    public function editUser(array $data, int $id, array $newData)
    {
        if (!$id && !isset($data[$id]) || empty($newData)) {
            return false;
        }

        $data[$id]->setName($newData['name']);
        $data[$id]->setEmail($newData['email']);
        $data[$id]->setPassword($newData['password']);

        return $data;
    }

    public function deleteUser(array $data, int $id)
    {
        if (!$id && !isset($data[$id]) && empty($data)) {
            return false;
        }

        unset($data[$id]);
        return $data;
    }
}