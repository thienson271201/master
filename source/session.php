<?php

// Gán session
function setSession($key, $value)
{
    return $_SESSION[$key] = $value;
}
//Hàm đọc session
function getSession($key)
{
    // return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    if (empty($key))
    {
        return $_SESSION;
    } else
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
    }
}

//hàm xoá session
function removeSession($key)
{
    if (empty($key))
    {
        session_destroy();
        return true;
    } else
    {
        if (isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
            return true;
        }
    }
}

//Hàm gán Flash data
function setFlashData($key, $value)
{
    $key = 'flash_' . $key;
    return setSession($key, $value);
}
//Hàm đọc flash data
function getFlashData($key)
{
    $key = 'flash_' . $key;
    $data = getSession($key);
    removeSession($key);
    return $data;
}