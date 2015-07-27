<?php

namespace ConoHa\Validator;

use ConoHa\Validator\Type\String;
use ConoHa\Validator\Type\Integer;
use ConoHa\Validator\Type\Float;

class Validator
{
    private $definitions = [];

    /**
     * バリデート条件の追加
     *
     * @param mixed $name バリデート名。配列で渡すと同じタイプで複数作成できる。
     * @param string $type タイプ(string, integer, float...)
     * @return ConoHa\Validator\Type\BaseType or array
     */
    public function add($name, $type)
    {
        if(is_array($name)) {
            $types = [];
            foreach($name as $n) {
                $types[$n] = $this->add($n, $type);
            }
            return $n;

        } else {
            switch($type) {
                case "string":
                    $t = new String;
                    break;
                case "integer":
                case "int":
                    $t = new Integer;
                    break;
                case "double":
                case "float":
                    $t = new Float;
                    break;
                default:
                    throw new \InvalidArgumentException('Undefined type "' . $type . '".');
            }

            $this->definition[$name] = $t;

            return $t;
        }
    }

    /**
     * バリデート条件の削除
     *
     * @param string $name バリデート名
     */
    public function remove($name)
    {
        if(isset($this->definition[$name])) {
            unset($this->definition[$name]);
        }
    }

    /**
     * バリデート条件を返す
     *
     * @return array
     */
    public function all()
    {
        return $this->definition;
    }

    /**
     * バリデートを実行する
     *
     * @param array $values バリデートする値の連想配列
     * @return array バリデート済みのパラメータ配列
     * @throws \ConoHa\Exception\ValidatorException
     */
    public function run(array $values)
    {
        $params = [];
        foreach($values as $name => $value) {
            // 定義にない値はスキップ
            if(!isset($this->definition[$name])) {
                continue;
            }

            $this->definition[$name]->validate($value);
            $params[$name] = $value;
        }

        return $params;
    }
}
