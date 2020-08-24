<?php

namespace EduMS;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use GraphAware\Neo4j\OGM\Common\Collection;

// src/graph.php


/**
 *
 * @OGM\Node(label="Node")
 */
 
class Graph 
{
//BEGIN ID
    /**
     * @var int
	 *
     * @OGM\GraphId()
     */
    protected $id;
	/**
     * @return int
     */
    public function getID()
    {
        return $this->id;
    }
//END ID
//BEGIN GUID
    /**
     * @var string
          *
     * @OGM\Property(type="string")
     */
    protected $guid;
	/**
     * @return string
     */
    public function getGUID()
    {
        return $this->guid;
    }
    /**
     * @param string $setGUID
     */
    public function setGUID($GUID)
    {
        $this->guid = $GUID;
    }
//END GUID
//BEGIN HISTORY
	/**
     * @var string
     *
     * @OGM\Property(type="string")
     */
    	protected $History;
	/**
     * @return string
     */
    public function getHistory()
    {
        return $this->History;
    }
    /**
     * @param string $History
     */
    public function setHistory($History)
    {
        $date=date(DATE_ATOM);
		$History_OLD=$this->getHistory();
		$this->History = $History_OLD."\n\r".$date." - ".$History;
    }
}