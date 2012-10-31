<?php

namespace Qafoo\CfpBundle\Entity;

class Cfp
{
    protected $start;

    protected $end;

    protected $url;

    protected $conferenceName;

    protected $conferenceUrl;

    protected $conferenceDate;

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
