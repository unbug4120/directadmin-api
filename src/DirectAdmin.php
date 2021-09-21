<?php

namespace Gegeriyadi\LaravelDirectAdmin;

use Gegeriyadi\LaravelDirectAdmin\DirectAdminApi;
use Gegeriyadi\LaravelDirectAdmin\NewAccountParameter;

class DirectAdmin
{
    use DirectAdminApi;

    public function getUserList()
    {
        $result = $this->process('GET', 'CMD_API_SHOW_USERS');

        return $result['list'];
    }

    public function createNewAccount(NewAccountParameter $newAccount)
    {
        $query = [
            'action' => 'create',
            'add' => 'Submit',
            'username' => $newAccount->username,
            'email' => $newAccount->email,
            'passwd' => $newAccount->passwd,
            'passwd2' => $newAccount->passwd,
            'domain' => $newAccount->domain,
            'package' => $newAccount->package,
            'ip' => config('directadmin.serverIp'),
            'notify' => 'no'
        ];

        $result = $this->process('POST', 'CMD_API_ACCOUNT_USER', $query);

        return $result;
    }

    public function deleteAccount($userToDelete)
    {
        $query = [
            'confirmed' => 'Confirm',
            'delete' => 'yes',
            'select0' => $userToDelete
        ];

        $result = $this->process('POST', 'CMD_API_SELECT_USERS', $query);

        return $result;
    }

    public function suspendAccount($userToSuspend)
    {
        $query = [
            'location' => 'CMD_SELECT_USERS',
            'suspend' => 'Suspend',
            'select0' => $userToSuspend
        ];

        $result = $this->process('POST', 'CMD_API_SELECT_USERS', $query);

        return $result;
    }

    public function unsuspendAccount($userToUnsuspend)
    {
        $query = [
            'location' => 'CMD_SELECT_USERS',
            'suspend' => 'Unsuspend',
            'select0' => $userToUnsuspend
        ];

        $result = $this->process('POST', 'CMD_API_SELECT_USERS', $query);

        return $result;
    }

}
