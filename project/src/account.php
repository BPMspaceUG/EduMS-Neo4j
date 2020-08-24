<?php

namespace EduMS;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

// src/Account.php


/**
 *
 * @OGM\Node(label="Account")
 */
 
class Account
{
    /**
     * @var int
	 *
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @var string
          *
     * @OGM\Property(type="string")
     */
    protected $guid;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $FirstName;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $LastName;

    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $Language;
	
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $PasswdHash;
	
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $PasswdSalt;
    
	/**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    	protected $History;
    
	/**
     * @return int
     */
    public function getID()
    {
        return $this->id;
    }

	/**
     * @return string
     */
    public function getGUID()
    {
        return $this->guid;
    }

	
    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->Language;
    }

    /**
     * @return string
     */
    public function getPasswdHash()
    {
        return $this->PasswdHash;
    }

    /**
     * @return string
     */
    public function getPasswdSalt()
    {
        return $this->PasswdSaltSalt;
    }
	
	/**
     * @return string
     */
    public function getHistory()
    {
        return $this->History;
    }


    /**
     * @param string $setGUID
     */
    public function setGUID($GUID)
    {
        $this->guid = $GUID;
    }

    /**
     * @param string $LastName
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    /**
     * @param string $FirstName
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }
    /**
     * @param string $Language
     */
    public function setLanguage($Language)
    {
        $this->Language = $Language;
    }
    /**
     * @param string $Passwd
     * @param string $PasswdSalt
     */
    public function setPasswdHash($Passwd,$PasswdSalt)
    {
		$passwdstring =  $Passwd.$PasswdSalt;
        $this->PasswdHash = hash('sha256',$passwdstring);
    }
    /**
     * @param string $PasswdSalt
     */
    public function setPasswdSalt($PasswdSalt)
    {
        $this->PasswdSalt = $PasswdSalt;
    }
    /**
     * @param string $History
     */
    public function setHistory($History)
    {
        $History_OLD=$this->getHistory();
		$this->History = $History_OLD."\n\r".date()." - ".$History;
    }


}