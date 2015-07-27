<?php

namespace ConoHa\Compute;

use ConoHa\Common\BaseService;
use ConoHa\Common\ResourceCollection;
use ConoHa\Compute\Resource\Flavor;

class Service extends BaseService
{
    public function flavors(
        $minDisk = null,
        $minRam  = null,
        $marker  = null,
        $limit   = null
    ) {
        $res = $this->getClient()->get($this->getUri('flavors'));

        $col = new ResourceCollection();
        $item = new Flavor();

        $col->fill($item, $res->getJson()->flavors);
        return $col;
    }

    /**
     * VMのプラン(flavor)の詳細情報を一覧取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/compute-get_flavors_detail.html
     * @return \ConoHa\Common\ResourceCollection
     */
    public function flavorsDetail(
        $minDisk = null,
        $minRam  = null,
        $marker  = null,
        $limit   = null
    ) {
        $res = $this->getClient()->get($this->getUri('flavors/detail'));

        $col = new ResourceCollection();
        $item = new Flavor();

        $col->fill($item, $res->getJson()->flavors);
        return $col;
    }
}
