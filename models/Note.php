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

    public static function currentUserId()
    {
        return Yii::$app->user->id ?? 0;
    }

    public static function all()
    {
        return self::$_userNotes[self::currentUserId()] ?? [];
    }

    public static function findOne($id)
    {
        $userId = self::currentUserId();
        return self::$_userNotes[$userId][$id] ?? null;
    }

    public static function add($title, $content)
    {
        $userId = self::currentUserId();
        //tablica dla denego usera musi istniec
        if (!isset(self::$_userNotes[$userId])) {
            self::$_userNotes[$userId] = [];
        }

        $id = count(self::$_userNotes[$userId]) + 1;
        self::$_userNotes[$userId][$id] = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
        ];
    }
}