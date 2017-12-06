<?php

namespace modules\hoduser\lib;

use hodphp\core\Lib;

class Auth extends Lib
{

    private $user;

    function __construct()
    {
        $this->setup();
    }

    function setup($userId = false)
    {
        if(!$userId) {
            $this->user = $this->service->user->getUserByHash($this->session->userHash);
        }else {
            $this->user = $this->service->user->getUserById($userId);
        }
    }

    function getField($field)
    {
        return $this->user->$field;
    }

    function getUserId()
    {
        if ($this->user) {
            if ($this->session->fakeUserId) {
                return $this->session->fakeUserId;
            } else {
                return $this->user->id;
            }
        }
        return 0;
    }

    function getUserName()
    {
        if ($this->user) {
            return $this->user->username;
        }
        return "";
    }

    function isAuthenticated()
    {
        return (bool)$this->user;
    }

    function isAuthorized($type, $key, $minLevel)
    {

        if ($this->user) {
            $id = $this->user->id;
        } else {
            $id = 0;
        }
        $level = $this->service->user->getLevel($id, $type, $key);
        return $level >= $minLevel;
    }

    function setUser($user)
    {
        $this->user = $user;
    }

    function setupFakeSession($id)
    {
        $this->session->fakeUserId = $id;
    }

    function isInFakeSession()
    {
        return $this->session->fakeUserId && $this->session->fakeUserId != $this->user->id;
    }

    function stopFakeSession()
    {
        $this->session->fakeUserId = false;
    }

    function getPreference($key)
    {
        if ($this->user) {
            $preference = $this->service->preference->getPreferenceByKey($this->user->id, $key);
            if ($preference) {
                return $preference->value;
            }
        }
        return false;
    }

    function setPreference($key, $value)
    {
        if ($this->user) {
            $this->service->preference->savePreference($this->user->id, $key, $value);
        }
    }
}

?>