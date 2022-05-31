<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="customers index content">
    <?= $this->Html->link(__('Agregar Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
   
    <h3><?= __('Todos mis Clientes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Apodo') ?></th>
                    <th><?= $this->Paginator->sort('Correo') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('Agregado') ?></th>
                    <th><?= $this->Paginator->sort('Modificado') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                   
                    <th><?= $this->Paginator->sort('group_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $this->Number->format($customer->id) ?></td>
                    <td><?= h($customer->name) ?></td>
                    <td><?= h($customer->apodo) ?></td>
                    <td><?= h($customer->email) ?></td>
                    <td><?= h($customer->direccion) ?></td>
                    <td><?= h($customer->created) ?></td>
                    <td><?= h($customer->modified) ?></td>
                    <td><?= $customer->has('user') ? $this->Html->link($customer->user->id, ['controller' => 'users', 'action' => 'ver', $customer->user->id]) : '' ?></td>
                    <td><?= $customer->has('group') ? $this->Html->link($customer->group->name, ['controller' => 'Groups', 'action' => 'view', $customer->group->id]) : '' ?></td>
                    
                     <td class="actions">
                        <?= $this->Html->link(__('Detalles'), ['action' => 'view', $customer->id]) ?>
                        <?= $this->Html->link(__('Editar '), ['action' => 'edit', $customer->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $customer->id], ['confirm' => __('Estas seguro de eliminar# {0}?', $customer->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
