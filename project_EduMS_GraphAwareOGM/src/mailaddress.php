<?php

namespace EduMS;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

// src/mailddress.php
/**
 *
 * @OGM\Node(label="Mail")
 */
 
class MailAdress extends Graph
{
//Begin MailAdress
    /**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    protected $MailAdress;
    /**
     * @return string
     */
	/**
     * @param string $Mail
     * @param string $Passwd
     */
    public function __construct($newMail)
	{
	$this->setMailAdress($newMail);
	$this->setHistory("Mail created by \$User");
	}
    public function getMailAdress()
    {
        return $this->MailAdress;
    }
    /**
     * @param string $MailAdress
     */
    public function setMailAdress($MailAdress)
    {
        $this->MailAdress = $MailAdress;
    }
//END MailAdress
//Functions

}
