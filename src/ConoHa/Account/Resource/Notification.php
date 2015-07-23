<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class Notification extends BaseResource
{
    /**
     * notification_code
     *
     * @var int $notification_code
     */
    protected $notification_code;

    /**
     * type
     *
     * @var string $type
     */
    protected $type;

    /**
     * title
     *
     * @var string $title
     */
    protected $title;

    /**
     * contents
     *
     * @var string $contents
     */
    protected $contents;

    /**
     * read_status
     *
     * @var string $read_status
     */
    protected $read_status;

    /**
     * start_date
     *
     * @var \DateTime $start_date
     */
    protected $start_date;



    /**
     * notification_codeのセット
     *
     * @param int notification_code
     */
    public function setNotificationCode($notification_code)
    {
        $this->notification_code = $notification_code;
    }

    /**
     * notification_codeの取得
     *
     * @return int
     */
    public function getNotificationCode()
    {
        return $this->notification_code;
    }

    /**
     * typeのセット
     *
     * @param string type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * typeの取得
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * titleのセット
     *
     * @param string title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * titleの取得
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * contentsのセット
     *
     * @param string contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * contentsの取得
     *
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * read_statusのセット
     *
     * @param string read_status
     */
    public function setReadStatus($read_status)
    {
        switch($read_status) {
            case "Read":
            case "Unread":
            case "ReadTitleOnly":
                break;

            default:
                throw new \InvalidArgumentException('$read_status must be "Read", "Unread" or "ReadTitleOnly".');
        }

        $this->read_status = $read_status;
    }

    /**
     * read_statusの取得
     *
     * @return string
     */
    public function getReadStatus()
    {
        return $this->read_status;
    }

    /**
     * start_dateのセット
     *
     * @param string start_date
     */
    public function setStartDate($start_date)
    {
        if(is_string($start_date)) {
            $start_date = new \DateTime($start_date);
        }
        $this->start_date = $start_date;
    }

    /**
     * start_dateの取得
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * 既読/未読ステータスを保存する
     *
     * @return void
     * @throws HttpErrorException
     */
    public function store()
    {
        $url = $this->service->getUri(['notifications', $this->getNotificationCode()]);
        $params = [
            'notification' => [
                'read_status' => $this->getReadStatus(),
            ]
        ];
        $this->service->getClient()->put($url, [
            'json_body' => $params,
            'debug' => true
        ]);
    }
}
