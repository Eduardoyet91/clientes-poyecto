<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $customer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Cliente'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Agregar Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Agregar Comentario'),['controller' => 'Comments', 'action' => 'add', $customer->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?= h($customer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($customer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apodo') ?></th>
                    <td><?= h($customer->apodo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($customer->email) ?></td>
                </tr>
                <th><?= __('Telefono') ?></th>
                    <td><?= h($customer->phone) ?></td>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($customer->direccion) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Pertenece al grupo:') ?></th>
                    <td><?= $customer->has('group') ? $this->Html->link($customer->group->name, ['controller' => 'Groups', 'action' => 'view', $customer->group->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agregado') ?></th>
                    <td><?= h($customer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ultima Edicion') ?></th>
                    <td><?= h($customer->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Comentarios') ?></h4>
                <?php if (!empty($customer->comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Created') ?></th>
                           
                            <th><?= __('Creado por') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($customer->comments as $comments) : ?>
                        <tr>
                            <td><?= h($comments->id) ?></td>
                            <td><?= h($comments->descripcion) ?></td>
                            <td><?= h($comments->created) ?></td>
                            <td><?= h($comments->user_name) ?></td>
                            
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
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
