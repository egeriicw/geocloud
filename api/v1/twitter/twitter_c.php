<?php
class Twitter_c extends Controller
{
    private $tweet;
    private $parts;

    function __construct()
    {
        global $postgisdb;
        //parent::__construct();
        $this->parts = $this->getUrlParts();
        $postgisdb = $this->parts[4];
        $this->tweet = new tweet();
    }

    public function search($search, $lifetime = 0)
    {
        return ($this->toJSON($this->tweet->search(urldecode($search), $store = $_REQUEST['store'], $schema = $this->parts[5])));
    }
}