<?php

namespace Modules\Decision\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Authorization model.
 *
 * @ORM\Entity
 * @ORM\Table(name="Authorization",uniqueConstraints={@ORM\UniqueConstraint(name="auth_idx", columns={"authorizer", "recipient", "meetingNumber"})})
 */
class Authorization
{
    /**
     * Authorization ID.
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * Member submitting this authorization.
     *
     * @ORM\ManyToOne(targetEntity="Modules\Decision\Entities\Member"))
     * @ORM\JoinColumn(name="authorizer", referencedColumnName="lidnr")
     */
    protected $authorizer;

    /**
     * Member receiving this authorization..
     *
     * @ORM\ManyToOne(targetEntity="Modules\Decision\Entities\Member"))
     * @ORM\JoinColumn(name="recipient", referencedColumnName="lidnr")
     */
    protected $recipient;

    /**
     * Meeting number
     *
     * @ORM\Column(name="meetingNumber", type="integer")
     */
    protected $meetingNumber;

    /**
     * Has the authorization been revoked?
     *
     * @ORM\Column(type="boolean")
     */
    protected $revoked = false;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Decision\Entities\Member
     */
    public function getAuthorizer()
    {
        return $this->authorizer;
    }

    /**
     * @param \Decision\Entities\Member $authorizer
     */
    public function setAuthorizer($authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     * @return \Decision\Entities\Member
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param \Decision\Entities\Member $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return integer
     */
    public function getMeetingNumber()
    {
        return $this->meetingNumber;
    }

    /**
     * @param integer $meetingNumber
     */
    public function setMeetingNumber($meetingNumber)
    {
        $this->meetingNumber = $meetingNumber;
    }

    /**
     * @return bool
     */
    public function getRevoked()
    {
        return $this->revoked;
    }

    /**
     * @param bool $revoked
     */
    public function setRevoked($revoked)
    {
        $this->revoked = $revoked;
    }
}
