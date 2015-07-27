<?php

namespace ConoHa\Compute;

use ConoHa\Common\BaseService;
use ConoHa\Common\ResourceCollection;
use ConoHa\Compute\Resource\Flavor;

/**
 * ConoHa Compute Service.
 *
 * Compute(VPS)扱うAPI群です。
 */
class Service extends BaseService
{
    /**
     * VMのプラン(flavor)を一覧取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/compute-get_flavors_list.html
     * @link https://www.conoha.jp/docs/compute-get_flavors_detail.html
     *
     * @param bool  $detail     詳細情報を含めて取得する場合はtrue
     * @param array $conditions (Optional)検索条件
     * @return \ConoHa\Common\ResourceCollection
     */
    public function flavors($detail = false, array $conditions = [])
    {
        $names         = [
            'min_disk' => 'int',
            'min_ram'  => 'int',
            'marker'   => 'int',
            'limit'    => 'int',
            'hoge'     => 'int',
        ];

        $validator = $this->getValidator();
        $validator->build($names);
        $query = $validator->run($conditions);

        if($detail) {
            $res = $this->getClient()->get($this->getUri('flavors/detail', $query));
        } else {
            $res = $this->getClient()->get($this->getUri('flavors', $query));
        }

        $col = new ResourceCollection();
        $item = new Flavor();

        $col->fill($item, $res->getJson()->flavors);
        return $col;
    }

    /**
     * VMのプラン(flavor)の詳細情報を取得する
     *
     * @api
     * @link https://www.conoha.jp/docs/compute-get_flavors_list.html
     * @return \ConoHa\Compute\Resource\Flavor
     */
    public function flavor($flavor_id)
    {
        $validator = $this->getValidator();
        $validator->add('flavor_id', 'string');
        $params = $validator->run(['flavor_id' => $flavor_id]);

        $res = $this->getClient()->get($this->getUri(['flavors', $params['flavor_id']]));
        $item = new Flavor();

        $item->populate($res->getJson()->flavor);
        return $item;
    }

}
