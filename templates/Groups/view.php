<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Editar Grupo'), ['action' => 'edit', $group->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Grupo'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'class' => 'side-nav-item']) ?>
            
            <?= $this->Html->link(__('Crear Grupo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="groups view content">
            <h3><?= h($group->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($group->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($group->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($group->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($group->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($group->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Clientes en el Grupo') ?></h4>
                <?php if (!empty($group->customers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apodo') ?></th>
                            <th><?= __('Correo') ?></th>
                            <th><?= __('Direccion') ?></th>
                            <th><?= __('Telefono') ?></th>
                            <th><?= __('Agregado') ?></th>
                            <th><?= __('Modificado') ?></th>
                           
                            
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($group->customers as $customers) : ?>
                        <tr>
                            <td><?= h($customers->id) ?></td>
                            <td><?= h($customers->name) ?></td>
                            <td><?= h($customers->apodo) ?></td>
                            <td><?= h($customers->email) ?></td>
                            <td><?= h($customers->direccion) ?></td>
                            <td><?= h($customers->phone) ?></td>
                            <td><?= h($customers->created) ?></td>
                            <td><?= h($customers->modified) ?></td>
                            
                            <td class="actions">
                                <?= $this->Html->link(__('Detalles'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Segurod de Eliminar # {0}?', $customers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
