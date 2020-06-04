<?php

namespace App\Models;

use Doctrine\ORM\EntityManager;

/**
 * @Entity @Table(name="users")
 */
class User extends Model implements \JsonSerializable
{
    public function __construct(EntityManager $db)
    {
        $this->db = $db;
    }

    /**
     * @GeneratedValue(strategy="AUTO")
     * @Id @Column(name="id", type="integer", nullable=false)
     */
    protected $id;

    /**
    * @uiid @Column(name="uiid", type="string", nullable=false)
    */
    protected $uiid;

    /**
     * @first_name @Column(type="string")
     */
    protected $first_name;

    /**
    * @last_name @Column(type="string")
    */
    protected $last_name;

    /**
    * @username @Column(type="string")
    */
    protected $username;

    /**
     * @email @Column(type="string")
     */
    protected $email;

    /**
     * @password @Column(type="string")
     */
    protected $password;

    /**
    * @mobile @Column(type="string")
    */
    protected $mobile;

    /**
     * @remember_token @Column(type="string")
     */
    protected $remember_token;

    /** @Column(type="datetime") */
    protected $email_verified_at;

    /** @Column(type="datetime") */
    protected $created_at;

    /** @Column(type="datetime") */
    protected $updated_at;

    public function jsonSerialize()
    {
        return [
            'uiid' => $this->uiid,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ];
    }
}
