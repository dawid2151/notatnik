<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;

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
                </div>
            <?php endforeach; ?>
      </div>

      <!-- Center Column: Form -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dodaj nową notatkę</h5>
            <form method="get" action="index.php?r=site%2Flogin">
              <div class="mb-3">
                <input type="text" class="form-control" id="note-title" name="title" placeholder="Tytuł" required>
              </div>
              <div class="mb-3">
                <textarea class="form-control" id="note-body" name="content" rows="3" placeholder="Treść" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-100">Dodaj</button>
            </form>
          </div>
        </div>
      </div>



    </div>
  </div>


    </div>
</div>
