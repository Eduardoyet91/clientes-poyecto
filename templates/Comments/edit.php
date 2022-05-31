<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="row">
   
    <div class="column-responsive column-80">
        <div class="comments form content">
            <?= $this->Form->create($comment) ?>
            <fieldset>
                <legend><?= __('Editar Comentario') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cargar comentario')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
