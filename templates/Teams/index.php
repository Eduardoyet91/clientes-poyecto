<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team[]|\Cake\Collection\CollectionInterface $teams
 */
?>
<div class="teams index content">
    <?= $this->Html->link(__('Crear Equipo de trabajo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mis Equipos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('creado') ?></th>
                    <th><?= $this->Paginator->sort('modificado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team): ?>
                <tr>
                    <td><?= $this->Number->format($team->id) ?></td>
                    <td><?= h($team->name) ?></td>
                    <td><?= h($team->descripcion) ?></td>
                    <td><?= h($team->created) ?></td>
                    <td><?= h($team->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Detalles'), ['action' => 'view', $team->id]) ?>
                        <?= $this->Html->link(__('Edita'), ['action' => 'edit', $team->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $team->id], ['confirm' => __('Estas seguro de eliminar # {0}?', $team->id)]) ?>
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
