<?php

namespace ConoHa\Validator\Type;

use ConoHa\Exception\ValidatorException;

/**
 * バリデータの値タイプ
 *
 * @abstract
 */
abstract class BaseType
{
    /**
     * 空パラメータを許容するか
     *
     * @var bool
     */
    private $nullok = true;

    /**
     * 空パラメータを許容するかを設定
     * 許容する場合true
     *
     * @param bool $nullok
     */
    public function setNullOk($nullok)
    {
        $this->nullok = $nullok;
    }

    /**
     * 空パラメータを許容するかを返す
     *
     * @return bool
     */
    public function getNullOk()
    {
        return $this->nullok;
    }

    /**
     * Typeの名前を取得
     *
     * @abstract
     * @return string
     */
    public function getName()
    {
        return get_class($this);
    }

    /**
     * 値を検証する
     *
     * @param  mixed $value
     * @return void
     */
    public function validate($value)
    {
        if(!$this->getNullOk() && is_null($value)) {
            throw new ValidatorException('The value shoud not be null.');
        }
    }
}
