<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Uporządkuj swoje zadania';
?>
<div class="site-index">

   
    <div class="body-content">

  <div class="container">
    <div class="row">

      <!-- Left Column: Notes -->
      <div class="col-md-8 mb-8" id="notes-left">
        <?php foreach ($notes as $note): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= Html::encode($note['title']) ?></h5>
                    <p class="card-text"><?= Html::encode($note['content']) ?></p>
                </div>
                <?= Html::a('×', ['site/delete', 'id' => $note['id']], [
                    'class' => 'btn btn-sm btn-danger',
                    'title' => 'delete',
                    'aria-label' => 'delete',
                    'data' => [
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        <?php endforeach; ?>
      </div>

      <!-- Center Column: Form -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dodaj nową notatkę</h5>
             <?php $form = ActiveForm::begin([
                'id' => 'new-note-form',
                'fieldConfig' => [
                    'template' => "{input}\n{error}",
                    'inputOptions' => ['class' => 'mb-3 form-control'],
                    'errorOptions' => ['class' => 'mb-3 invalid-feedback'],
                ],
            ]); ?>
            <?= $form->field($model, 'title')->textInput(['placeholder' => 'Tytuł']) ?>
            <?= $form->field($model, 'content')->textArea(['placeholder' => 'Treść']) ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Dodaj', ['class' => 'btn btn-primary w-100', 'name' => 'add-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

          </div>
        </div>
      </div>



    </div>
  </div>


    </div>
</div>
