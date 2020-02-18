<?php

/**
  * @author Amjad Iqbal
  * @author Amjad Iqbal <douglasm@outlook.com>
  */
  
namespace DMSysOp\SweetAlert\Storage;

interface SessionStore
{
    /**
     * Flash some data into the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data);
}
