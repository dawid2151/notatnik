<?php

namespace app\models;

use Yii;

class Note
{
    public $id;
    public $title;
    public $content;

    private static $_userNotes = [
        '100' => [
            [
                'id' => 1,
                'title' => 'Shopping List',
                'content' => 'Bread, Eggs, Milk',
            ],
            [
                'id' => 2,
                'title' => 'Work Tasks',
                'content' => 'Prepare slides, Send report',
            ],
        ],
        '101' => [
            [
                'id' => 1,
                'title' => 'Books to Read',
                'content' => '1984, Brave New World',
            ],
        ],
    ];

    public function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    private static function save($data)
    {
        Yii::$app->session->set('notes', $data);
    }


    public static function currentUserId()
    {
        return Yii::$app->user->id ?? 0;
    }

    public static function all()
    {
        $data = Yii::$app->session->get('notes', []);
        return $data[self::currentUserId()] ?? [];
    }

    public static function add($title, $content)
    {
        $data = Yii::$app->session->get('notes', []);
        $userId = self::currentUserId();
        if (!isset($data[$userId])) 
        {
            $data[$userId] = [];
        }
        $nextId = empty($data[$userId]) ? 1 : (max(array_keys($data[$userId])) + 1);
        $data[$userId][$nextId] = ['id' => $nextId, 'title' => $title, 'content' => $content];
        self::save($data);
    }

    public static function delete($id)
    {
        $data = Yii::$app->session->get('notes', []);
        $u = self::currentUserId();
        if (isset($data[$u][$id])) 
        {
            unset($data[$u][$id]);
            Yii::$app->session->set('notes', $data);
            return true;
        }
        return false;
    }
}