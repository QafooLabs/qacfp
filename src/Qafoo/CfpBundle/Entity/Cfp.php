<?php

namespace Qafoo\CfpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cfp")
 */
class Cfp
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    protected $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    protected $end;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150)
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $conferenceName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150)
     */
    protected $conferenceUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    protected $conferenceDate;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId($id)
    {
        return $this->id;
    }

    public function setStart( \DateTime $startDate )
    {
        $this->start = $startDate;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setEnd( \DateTime $endDate )
    {
        $this->end = $endDate;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setUrl( $url )
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setConferenceName( $conferenceName )
    {
        $this->conferenceName = $conferenceName;
    }

    public function getConferenceName()
    {
        return $this->conferenceName;
    }

    public function setConferenceUrl( $conferenceUrl )
    {
        $this->conferenceUrl = $conferenceUrl;
    }

    public function getConferenceUrl()
    {
        return $this->conferenceUrl;
    }

    public function setConferenceDate( \DateTime $conferenceDate )
    {
        $this->conferenceDate = $conferenceDate;
    }

    public function getConferenceDate()
    {
        return $this->conferenceDate;
    }
}
