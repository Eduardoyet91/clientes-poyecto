<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 */
?>
<div class="row">
   
    <div class="column-responsive column-80">
        <div class="comments form content">
            <?= $this->Form->create($comment) ?>
            <fieldset>
                <legend><?= __('Agregar comentario:') ?></legend>
                <?php
                    echo $this->Form->control('descripcion',['label'=>'Comentario:']);
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cargar Comentario')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
