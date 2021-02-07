<?php

namespace Modules\Decision\Entities\SubDecision\Board;

use Doctrine\ORM\Mapping as ORM;

use Modules\Decision\Entities\SubDecision;
use Modules\Decision\Entities\Member;

/**
 * Installation as board member.
 *
 * @ORM\Entity
 */
class Installation extends SubDecision
{
    /**
     * Function in the board.
     *
     * @ORM\Column(type="string")
     */
    protected $function;

    /**
     * Member.
     *
     * Note that only members that are older than 18 years can be board members.
     * Also, honorary, external and extraordinary members cannot be board members.
     * (See the Statuten, Art. 13 Lid 2.
     *
     * @todo Inversed relation
     *
     * @ORM\ManyToOne(targetEntity="Modules\Decision\Entities\Member")
     * @ORM\JoinColumn(name="lidnr", referencedColumnName="lidnr")
     */
    protected $member;

    /**
     * The date at which the installation is in effect.
     *
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * Discharge.
     *
     * @ORM\OneToOne(targetEntity="Modules\Decision\Entities\SubDecision\Board\Discharge",mappedBy="installation")
     */
    protected $discharge;

    /**
     * Release.
     *
     * @ORM\OneToOne(targetEntity="Modules\Decision\Entities\SubDecision\Board\Release",mappedBy="installation")
     */
    protected $release;

    /**
     * Board member reference.
     *
     * @ORM\OneToOne(targetEntity="Modules\Decision\Entities\BoardMember", mappedBy="installationDec")
     */
    protected $boardMember;


    /**
     * Get the function.
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set the function.
     *
     * @param string $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * Get the member.
     *
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set the member.
     *
     * @param Member $member
     */
    public function setMember(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get the date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the date.
     *
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get the discharge.
     *
     * @return Discharge
     */
    public function getDischarge()
    {
        return $this->discharge;
    }

    /**
     * Get the release.
     *
     * @return Release
     */
    public function getRelease()
    {
        return $this->release;
    }

    /**
     * Get the board member decision.
     *
     * @return BoardMember
     */
    public function getBoardMember()
    {
        return $this->boardMember;
    }
}
