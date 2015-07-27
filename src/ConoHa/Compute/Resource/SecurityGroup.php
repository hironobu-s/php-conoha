<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;

class SecurityGroup extends BaseResource
{
    /**
     * description
     *
     * @var string $description
     */
    protected $description;

    /**
     * id
     *
     * @var string $id
     */
    protected $id;

    /**
     * name
     *
     * @var string $name
     */
    protected $name;

    /**
     * rules
     *
     * @var array $rules
     */
    protected $rules;

    /**
     * tenant_id
     *
     * @var string $tenant_id
     */
    protected $tenant_id;



    /**
     * descriptionのセット
     *
     * @param string description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * descriptionの取得
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * idのセット
     *
     * @param string id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * idの取得
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * nameのセット
     *
     * @param string name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * nameの取得
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * rulesのセット
     *
     * @param array rules
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * rulesの取得
     *
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * tenant_idのセット
     *
     * @param string tenant_id
     */
    public function setTenantId($tenant_id)
    {
        $this->tenant_id = $tenant_id;
    }

    /**
     * tenant_idの取得
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->tenant_id;
    }

}
