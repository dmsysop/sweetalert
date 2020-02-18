<?php

/**
  * @author Amjad Iqbal
  * @author Amjad Iqbal <douglasm@outlook.com>
  */

namespace DMSysOp\SweetAlert\Storage;

use Illuminate\Session\Store;

class AlertSessionStore implements SessionStore
{
    /**
     * @var Store
     */
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Set a session key and value.
     *
     * @param  mixed $key
     * @param  string $data
     *
     * @return mixed
     */
    public function flash($key, $data)
    {
        $this->session->flash($key, $data);
    }

}
