<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * boat_worker
 *
 * @ORM\Table(name="boat_worker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\boat_workerRepository")
 */
class boat_worker implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="boat_id", type="integer")
     */
    private $boatId;

    /**
     * @var int
     *
     * @ORM\Column(name="worker_id", type="integer")
     */
    private $workerId;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set boatId
     *
     * @param integer $boatId
     *
     * @return boat_worker
     */
    public function setBoatId($boatId)
    {
        $this->boatId = $boatId;

        return $this;
    }

    /**
     * Get boatId
     *
     * @return int
     */
    public function getBoatId()
    {
        return $this->boatId;
    }

    /**
     * Set workerId
     *
     * @param integer $workerId
     *
     * @return boat_worker
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;

        return $this;
    }

    /**
     * Get workerId
     *
     * @return int
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }
	
	public function jsonSerialize()
    {
        return array(
			'id' => $this->id,
            'boat_id' => $this->boatId,
            'worker_id' => $this->workerId
        );
    }
}

