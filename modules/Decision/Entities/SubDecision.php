<?php

namespace Modules\Decision\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubDecision model.
 *
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *  "foundation"="Modules\Decision\Entities\SubDecision\Foundation",
 *  "abrogation"="Modules\Decision\Entities\SubDecision\Abrogation",
 *  "installation"="Modules\Decision\Entities\SubDecision\Installation",
 *  "discharge"="Modules\Decision\Entities\SubDecision\Discharge",
 *  "budget"="Modules\Decision\Entities\SubDecision\Budget",
 *  "reckoning"="Modules\Decision\Entities\SubDecision\Reckoning",
 *  "other"="Modules\Decision\Entities\SubDecision\Other",
 *  "destroy"="Modules\Decision\Entities\SubDecision\Destroy",
 *  "board_installation"="Modules\Decision\Entities\SubDecision\Board\Installation",
 *  "board_release"="Modules\Decision\Entities\SubDecision\Board\Release",
 *  "board_discharge"="Modules\Decision\Entities\SubDecision\Board\Discharge",
 *  "foundationreference"="Modules\Decision\Entities\SubDecision\FoundationReference"
 * })
 */
abstract class SubDecision
{
    /**
     * Decision.
     *
     * @ORM\ManyToOne(targetEntity="Modules\Decision\Entities\Decision", inversedBy="subdecisions")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="meeting_type", referencedColumnName="meeting_type"),
     *  @ORM\JoinColumn(name="meeting_number", referencedColumnName="meeting_number"),
     *  @ORM\JoinColumn(name="decision_point", referencedColumnName="point"),
     *  @ORM\JoinColumn(name="decision_number", referencedColumnName="number"),
     * })
     */
    protected $decision;

    /**
     * Meeting type.
     *
     * NOTE: This is a hack to make the decision a primary key here.
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $meeting_type;

    /**
     * Meeting number
     *
     * NOTE: This is a hack to make the decision a primary key here.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $meeting_number;

    /**
     * Decision point.
     *
     * NOTE: This is a hack to make the decision a primary key here.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $decision_point;

    /**
     * Decision number.
     *
     * NOTE: This is a hack to make the decision a primary key here.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $decision_number;

    /**
     * Sub decision number.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $number;

    /**
     * Content.
     *
     * @ORM\Column(type="text")
     */
    protected $content;


    /**
     * Get the decision.
     *
     * @return Decision
     */
    public function getDecision()
    {
        return $this->decision;
    }

    /**
     * Set the decision.
     *
     * @param Decision $decision
     */
    public function setDecision(Decision $decision)
    {
        $decision->addSubdecision($this);
        $this->meeting_type = $decision->getMeetingType();
        $this->meeting_number = $decision->getMeetingNumber();
        $this->decision_point = $decision->getPoint();
        $this->decision_number = $decision->getNumber();
        $this->decision = $decision;
    }

    /**
     * Get the meeting type.
     *
     * @return string
     */
    public function getMeetingType()
    {
        return $this->meeting_type;
    }

    /**
     * Get the meeting number.
     *
     * @return int
     */
    public function getMeetingNumber()
    {
        return $this->meeting_number;
    }

    /**
     * Get the decision point number.
     *
     * @return int
     */
    public function getDecisionPoint()
    {
        return $this->decision_point;
    }

    /**
     * Get the decision number.
     *
     * @return int
     */
    public function getDecisionNumber()
    {
        return $this->number;
    }

    /**
     * Get the number.
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the number.
     *
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get the content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
