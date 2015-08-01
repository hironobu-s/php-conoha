<?php

namespace ConoHa\Compute\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Compute\Resource\Link;
use ConoHa\Compute\Resource\Flavor;
use ConoHa\Compute\Resource\Image;
use ConoHa\Compute\Resource\Address;
use ConoHa\Compute\Resource\SecurityGroup;
use ConoHa\Compute\Resource\Metadata;

class Server extends BaseResource
{
    /**
     * diskconfig
     *
     * @var string $diskconfig
     */
    protected $diskconfig;

    /**
     * availability_zone
     *
     * @var string $availability_zone
     */
    protected $availability_zone;

    /**
     * host
     *
     * @var string $host
     */
    protected $host;

    /**
     * hypervisor_hostname
     *
     * @var string $hypervisor_hostname
     */
    protected $hypervisor_hostname;

    /**
     * instance_name
     *
     * @var string $instance_name
     */
    protected $instance_name;

    /**
     * power_state
     *
     * @var int $power_state
     */
    protected $power_state;

    /**
     * task_state
     *
     * @var string $task_state
     */
    protected $task_state;

    /**
     * vm_state
     *
     * @var string $vm_state
     */
    protected $vm_state;

    /**
     * launched_at
     *
     * @var string $launched_at
     */
    protected $launched_at;

    /**
     * terminated_at
     *
     * @var string $terminated_at
     */
    protected $terminated_at;

    /**
     * access_ipv4
     *
     * @var string $access_ipv4
     */
    protected $access_ipv4;

    /**
     * access_ipv6
     *
     * @var string $access_ipv6
     */
    protected $access_ipv6;

    /**
     * addresses
     *
     * @var array $addresses
     */
    protected $addresses;

    /**
     * config_drive
     *
     * @var string $config_drive
     */
    protected $config_drive;

    /**
     * created
     *
     * @var datetime $created
     */
    protected $created;

    /**
     * flavor
     *
     * @var array $flavor
     */
    protected $flavor;

    /**
     * hostId
     *
     * @var string $hostId
     */
    protected $hostId;

    /**
     * id
     *
     * @var string $id
     */
    protected $id;

    /**
     * images
     *
     * @var array $images
     */
    protected $images;

    /**
     * keyname
     *
     * @var string $keyname
     */
    protected $keyname;

    /**
     * links
     *
     * @var array $links
     */
    protected $links;

    /**
     * metadata
     *
     * @var array $metadata
     */
    protected $metadata;

    /**
     * name
     *
     * @var string $name
     */
    protected $name;

    /**
     * volumes_attached
     *
     * @var array $volumes_attached
     */
    protected $volumes_attached;

    /**
     * security_groups
     *
     * @var array $security_groups
     */
    protected $security_groups;

    /**
     * status
     *
     * @var string $status
     */
    protected $status;

    /**
     * tenant_id
     *
     * @var string $tenant_id
     */
    protected $tenant_id;

    /**
     * updated
     *
     * @var string $updated
     */
    protected $updated;

    /**
     * user_id
     *
     * @var string $user_id
     */
    protected $user_id;



    /**
     * diskconfigのセット
     *
     * @param string diskconfig
     */
    public function setDiskconfig($diskconfig)
    {
        $this->diskconfig = $diskconfig;
    }

    /**
     * diskconfigの取得
     *
     * @return string
     */
    public function getDiskconfig()
    {
        return $this->diskconfig;
    }

    /**
     * availability_zoneのセット
     *
     * @param string availability_zone
     */
    public function setAvailabilityZone($availability_zone)
    {
        $this->availability_zone = $availability_zone;
    }

    /**
     * availability_zoneの取得
     *
     * @return string
     */
    public function getAvailabilityZone()
    {
        return $this->availability_zone;
    }

    /**
     * hostのセット
     *
     * @param string host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * hostの取得
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * hypervisor_hostnameのセット
     *
     * @param string hypervisor_hostname
     */
    public function setHypervisorHostname($hypervisor_hostname)
    {
        $this->hypervisor_hostname = $hypervisor_hostname;
    }

    /**
     * hypervisor_hostnameの取得
     *
     * @return string
     */
    public function getHypervisorHostname()
    {
        return $this->hypervisor_hostname;
    }

    /**
     * instance_nameのセット
     *
     * @param string instance_name
     */
    public function setInstanceName($instance_name)
    {
        $this->instance_name = $instance_name;
    }

    /**
     * instance_nameの取得
     *
     * @return string
     */
    public function getInstanceName()
    {
        return $this->instance_name;
    }

    /**
     * power_stateのセット
     *
     * @param int power_state
     */
    public function setPowerState($power_state)
    {
        $this->power_state = $power_state;
    }

    /**
     * power_stateの取得
     *
     * @return int
     */
    public function getPowerState()
    {
        return $this->power_state;
    }

    /**
     * task_stateのセット
     *
     * @param string task_state
     */
    public function setTaskState($task_state)
    {
        $this->task_state = $task_state;
    }

    /**
     * task_stateの取得
     *
     * @return string
     */
    public function getTaskState()
    {
        return $this->task_state;
    }

    /**
     * vm_stateのセット
     *
     * @param string vm_state
     */
    public function setVmState($vm_state)
    {
        $this->vm_state = $vm_state;
    }

    /**
     * vm_stateの取得
     *
     * @return string
     */
    public function getVmState()
    {
        return $this->vm_state;
    }

    /**
     * launched_atのセット
     *
     * @param string launched_at
     */
    public function setLaunchedAt($launched_at)
    {
        $this->launched_at = $launched_at;
    }

    /**
     * launched_atの取得
     *
     * @return string
     */
    public function getLaunchedAt()
    {
        return $this->launched_at;
    }

    /**
     * terminated_atのセット
     *
     * @param string terminated_at
     */
    public function setTerminatedAt($terminated_at)
    {
        $this->terminated_at = $terminated_at;
    }

    /**
     * terminated_atの取得
     *
     * @return string
     */
    public function getTerminatedAt()
    {
        return $this->terminated_at;
    }

    /**
     * access_ipv4のセット
     *
     * @param string access_ipv4
     */
    public function setAccessIpv4($access_ipv4)
    {
        $this->access_ipv4 = $access_ipv4;
    }

    /**
     * access_ipv4の取得
     *
     * @return string
     */
    public function getAccessIpv4()
    {
        return $this->access_ipv4;
    }

    /**
     * access_ipv6のセット
     *
     * @param string access_ipv6
     */
    public function setAccessIpv6($access_ipv6)
    {
        $this->access_ipv6 = $access_ipv6;
    }

    /**
     * access_ipv6の取得
     *
     * @return string
     */
    public function getAccessIpv6()
    {
        return $this->access_ipv6;
    }

    /**
     * addressesのセット
     *
     * @param array addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * addressesの取得
     *
     * @return array
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * config_driveのセット
     *
     * @param string config_drive
     */
    public function setConfigDrive($config_drive)
    {
        $this->config_drive = $config_drive;
    }

    /**
     * config_driveの取得
     *
     * @return string
     */
    public function getConfigDrive()
    {
        return $this->config_drive;
    }

    /**
     * createdのセット
     *
     * @param datetime created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * createdの取得
     *
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * flavorのセット
     *
     * @param array flavor
     */
    public function setFlavor($flavor)
    {
        $this->flavor = $flavor;
    }

    /**
     * flavorの取得
     *
     * @return array
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * hostIdのセット
     *
     * @param string hostId
     */
    public function setHostId($hostId)
    {
        $this->hostId = $hostId;
    }

    /**
     * hostIdの取得
     *
     * @return string
     */
    public function getHostId()
    {
        return $this->hostId;
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
     * imagesのセット
     *
     * @param object images
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * imagesの取得
     *
     * @return
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * keynameのセット
     *
     * @param string keyname
     */
    public function setKeyname($keyname)
    {
        $this->keyname = $keyname;
    }

    /**
     * keynameの取得
     *
     * @return string
     */
    public function getKeyname()
    {
        return $this->keyname;
    }

    /**
     * linksのセット
     *
     * @param array links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * linksの取得
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * metadataのセット
     *
     * @param array metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * metadataの取得
     *
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
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
     * volumes_attachedのセット
     *
     * @param array volumes_attached
     */
    public function setVolumesAttached($volumes_attached)
    {
        $this->volumes_attached = $volumes_attached;
    }

    /**
     * volumes_attachedの取得
     *
     * @return array
     */
    public function getVolumesAttached()
    {
        return $this->volumes_attached;
    }

    /**
     * security_groupsのセット
     *
     * @param array security_groups
     */
    public function setSecurityGroups($security_groups)
    {
        $this->security_groups = $security_groups;
    }

    /**
     * security_groupsの取得
     *
     * @return array
     */
    public function getSecurityGroups()
    {
        return $this->security_groups;
    }

    /**
     * statusのセット
     *
     * @param string status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * statusの取得
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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

    /**
     * updatedのセット
     *
     * @param string updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * updatedの取得
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * user_idのセット
     *
     * @param string user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * user_idの取得
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    public function populate(\StdClass $json)
    {
        parent::populate($json);

        // links
        $links = [];
        foreach($json->links as $link) {
            $l = new Link();
            $l->populate($link);
            $links[] = $l;
        }
        $this->setLinks($links);

        // addresss
        $addresses = [];
        foreach($json->addresses as $address) {
            $l = new Address();
            $l->populate($address[0]);
            $addresses[] = $l;
        }
        $this->setAddresses($addresses);

        // flavor
        $f = new Flavor();
        $f->populate($json->flavor);
        $this->setFlavor($f);

        // image
        $i = new Image();
        $i->populate($json->image);
        $this->setImage($i);

        // security_groups
        $security_groups = [];
        foreach($json->security_groups as $sec) {
            $l = new SecurityGroup();
            $l->populate($sec);
            $security_groups[] = $l;
        }
        $this->setSecurityGroups($security_groups);

        // metadata
        $m = new Metadata();
        foreach($json->metadata as $name => $value) {
            $m->{$name} = $value;
        }
        $this->setMetadata($m);
    }
}
