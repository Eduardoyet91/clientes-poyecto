<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<div class="groups index content">
    <?= $this->Html->link(__('Crear Grupo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mis grupos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Descripcion') ?></th>
                    <th><?= $this->Paginator->sort('creado') ?></th>
                    <th><?= $this->Paginator->sort('modificado') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groups as $group): ?>
                <tr>
                    <td><?= $this->Number->format($group->id) ?></td>
                    <td><?= h($group->name) ?></td>
                    <td><?= h($group->descripcion) ?></td>
                    <td><?= h($group->created) ?></td>
                    <td><?= h($group->modified) ?></td>
                   
                    <td class="actions">
                        <?= $this->Html->link(__('Detalles'), ['action' => 'view', $group->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $group->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $group->id], ['confirm' => __('Seguro de eliminar el grupo # {0}?', $group->id)]) ?>
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
