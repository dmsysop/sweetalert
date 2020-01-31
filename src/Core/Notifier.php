<?php

/**
  * @author Amjad Iqbal
  * @author Amjad Iqbal <contact@amjadiqbal.me>
  */
  
namespace DMSysOp\SweetAlert\Core;

use DMSysOp\SweetAlert\Storage\SessionStore;

class Notifier
{
    /**
     * Session storage.
     *
     * @var DMSysOp\SweetAlert\Storage\Session
     */
    protected $session;

    /**
     * Configuration constructor.
     *
     * @var array
     */
    protected $config;

    public function __construct(SessionStore $session)
    {
        $this->setDefaultConfig();
        $this->session = $session;
    }

     /**
     * Seting default config options for alert boxes.
     *
     * @return void
     */
    protected function setDefaultConfig()
    {
        $configuration = array();
        foreach( config('sweetalert.default') as $key => $value ){
            $configuration[$key] = $value;
        }
        $this->config = $configuration;
        
    }



    /**
     * Flash sweetalert popup.
     *
     * @param  string $title
     * @param  string $text
     * @param  array  $type
     *
     * @return void
     */
    public function alert($data = array())
    {
        foreach($data as $key => $value){
            $this->config[$key] = $value;
        }
        $this->flash();
        return $this;
    }



    /**
     * Flashing config options for alert in session store.
     *
     * @return void
     */
    public function flash()
    {
        foreach ($this->config as $key => $value) {
            $this->session->flash("alert.config.{$key}", $value);
        }
        $this->session->flash('alert.config', $this->buildAlertConfig());
    }

    /**
     * Build Flash config options for displaying popup.
     *
     * @return void
     */
    public function buildAlertConfig()
    {
        $config = $this->config;
        return json_encode($config);
    }
}
