<?php

/**
  * @author Amjad Iqbal
  * @author Amjad Iqbal <contact@amjadiqbal.me>
  */
  
if (!function_exists('alert')) {
    /**
     * Return app instance of Alert.
     *
     * @return DMSysOp\SweetAlert\Core\Toaster
     */

    function alert($data = array())
    {
        $sweetalert = app('alert');
        if (!empty($data['title'])) {
            return $sweetalert->alert($data);
        }
        return $sweetalert;
    }

}

