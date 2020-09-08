<?php

namespace EduMS;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

// src/Account.php


/**
 *
 * @OGM\Node(label="Account")
 */
 
class Account extends Graph
{
//Begin FirstName
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $FirstName;
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }
    /**
     * @param string $FirstName
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }
//END FirstName
//BEGIN LastName
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $LastName;
    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->LastName;
    }
    /**
     * @param string $LastName
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }
//END LastName
//BEGIN Language
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $Language;
    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->Language;
    }
    /**
     * @param string $Language
     */
    public function setLanguage($Language)
    {
        $this->Language = $Language;
    }
//END Language
//BEGIN PasswdHash
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $PasswdHash;
    /**
     * @return string
     */
    public function getPasswdHash()
    {
        return $this->PasswdHash;
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
//END PasswdHash
//BEGIN PasswdSalt
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $PasswdSalt;
    /**
     * @return string
     */
    public function getPasswdSalt()
    {
        return $this->PasswdSaltSalt;
    }
    /**
     * @param string $PasswdSalt
     */
    public function setPasswdSalt($PasswdSalt)
    {
        $this->PasswdSalt = $PasswdSalt;
    }
//END PasswdHash
//BEGIN Relation ListMailaddress
    /**
     * @var ListMailaddress[]|Collection
     * 
     * @OGM\Relationship(type="has_Mail_Address", direction="OUTGOING", collection=true, mappedBy="owner", targetEntity="Mailaddress")
     */
    protected $ListMailaddress;
    /**
     * @return Mailaddress[]|Collection
     */
    public function getListMailaddress()
    {
        return $this->ListMailaddress;
    }
//END Relation Mailaddress
//Functions
    /**
     * @param string $Mail
     * @param string $Passwd
     */
    public function __construct($newAccountFirstName,$newAccountLastName,$newAccountLanguage,$newAccountPassword,$newMail)
	{
	global $entityManager;
	//$uuid = Uuid::uuid4();
	$uuid = base64_encode(uniqid(uniqid(),TRUE));
	$this->setGUID($uuid);
	$this->setFirstName($newAccountFirstName);
	$this->setLastName($newAccountLastName);
	$this->setLanguage($newAccountLanguage);
	//$uuid = Uuid::uuid4();
	$uuid = base64_encode(uniqid(uniqid(),TRUE));
	$this->setPasswdSalt($uuid);
	$this->setPasswdHash($newAccountPassword,$uuid);
	$MailA = new MailAdress($newMail);
	$entityManager->persist($MailA);
	$entityManager->flush();
	$this->ListMailaddress = new Collection();
	$this->setHistory("Account created by \$User");
	}
    /**  
     * @param string $Mail
     * @param string $Passwd
     */
    public function login($Mail,$Passwd)
    {
		//get acctount by verified mail
		//get salt fo account $PasswdSalt= 
		//$passwdstring =  $Passwd.$PasswdSalt;
		//$challenge= hash('sha256',$passwdstring);
        //$this->PasswdHash = hash('sha256',$passwdstring);
    }
}
