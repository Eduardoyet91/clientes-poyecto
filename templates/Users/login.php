<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor Ingrese correo y contraseña') ?></legend>
        <?= $this->Form->control('email',['label'=> 'Ingrese correo:',]) ?>
        <?= $this->Form->control('password',['label'=> 'Ingrese Contraseña:',]) ?>
    </fieldset>
    <?= $this->Form->button(__('Iniciar sesion')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('Registrarse'), ['controller' => 'Users', 'action' => 'add']) ?>
</div>

