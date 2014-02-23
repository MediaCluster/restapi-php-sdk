<?php
/**
 * +----------------------------------------------------------------------
 * | LocalStorage.php 2014-02-23 15:22
 * +----------------------------------------------------------------------
 * | Authors       Michael Pieperhoff <michael.pieperhoff@gmail.com>
 * +----------------------------------------------------------------------
 */

class Immocaster_Data_Local {

    static private $instance = null;

    private $requestKey = '';

    private $requestSecret = '';

    public function getInstance($data = array()) {
        if (!isset(self::$instance))
        {
            self::$instance = new self($data);
        }
        return self::$instance;
    }

    public function __construct(array $data = array()) {
        if(empty($data)) {
            throw new \InvalidArgumentException("Missing configuration for immocaster sdk.");
        }
        else {
            $this->requestKey = $data[1];
            $this->requestSecret = $data[2];
        }
    }

    public function getApplicationToken() {

        if('' == $this->requestKey && '' == $this->requestSecret) {
            return null;
        }

        $result = new \stdClass();
        $result->ic_key = $this->requestKey;
        $result->ic_secret = $this->requestSecret;

        return $result;
    }
} 