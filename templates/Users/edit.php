<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $labels
 * @var string[]|\Cake\Collection\CollectionInterface $teams
 */
?>
<div class="row">
  
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Perfil') ?></legend>
                <?php
                    echo $this->Form->control('name',['label'=> 'Nombre: ' ]);
                    echo $this->Form->control('email',['label'=> 'Correo: ' ]);
                    echo $this->Form->control('password');
                   
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
