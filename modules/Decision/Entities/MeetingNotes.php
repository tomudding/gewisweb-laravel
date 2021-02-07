<?php

namespace Modules\Decision\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meeting notes.
 *
 * @ORM\Entity
 * @ORM\Table(name="MeetingNotes")
 */
class MeetingNotes
{
    /**
     * Meeting type.
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * Meeting number.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $number;

    /**
     * The corresponding meeting for these notes.
     *
     * @ORM\OneToOne(targetEntity="Modules\Decision\Entities\Meeting", inversedBy="meetingNotes")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="type", referencedColumnName="type"),
     *  @ORM\JoinColumn(name="number", referencedColumnName="number"),
     * })
     */
    protected $meeting;

    /**
     * The storage path
     *
     * @ORM\Column(type="string")
     */
    protected $path;

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param \Decision\Entities\Meeting $meeting
     */
    public function setMeeting($meeting)
    {
        $this->meeting = $meeting;
        $this->type = $meeting->getType();
        $this->number = $meeting->getNumber();
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
}
