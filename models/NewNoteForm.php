<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewNoteForm extends Model
{
    public $title;
    public $content;

    public function rules()
    {
        return [
            [['title', 'content'], 'required']
        ];
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        Note::add($this->title, $this->content);
        return true;
    }

}