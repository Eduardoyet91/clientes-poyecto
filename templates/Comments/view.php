<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Accion') ?></h4>
            <?= $this->Html->link(__('Editar Comentario'), ['action' => 'edit', $comment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Comentario'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'side-nav-item']) ?>
            
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="comments view content">
            <h3><?= h($comment->created) ?></h3>
            <table>
                <tr>
                    <th><?= __('Comentario') ?></th>
                    <td><?= h($comment->descripcion) ?></td>
                </tr>
               
               
                
                <tr>
                <th><?= __('Creado por:') ?></th>

                    <td><?= $comment->user_name ?></td>
</tr>
 </table>
        </div>
    </div>
</div>
