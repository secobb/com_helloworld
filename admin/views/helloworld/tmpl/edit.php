<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');

// Загружаем проверку формы.
JHtml::_('behavior.formvalidator');

// Получаем параметры из формы.
$params = $this->form->getFieldsets('params');
?>
<form action="<?php echo JRoute::_('index.php?option=com_helloworld&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
<div class="form-horizontal">
    <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>
    <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_HELLOWORLD_HELLOWORLD_DETAILS')); ?>
    <div>
            <ul>
                <?php foreach ($this->form->getFieldset('details') as $field) : ?>
                    <li><?php echo $field->label; echo $field->input; ?></li>
                <?php endforeach; ?>
            </ul>    
    </div>
    <?php echo JHtml::_('bootstrap.endTab'); ?>


        <?php 
 
        foreach ($params as $name => $fieldset):
            echo JHtml::_('bootstrap.addTab', 'myTab', $name.'-params', JText::_($fieldset->label));
 
            if (isset($fieldset->description) && trim($fieldset->description)) : ?>
                <p><?php echo $this->escape(JText::_($fieldset->description));?></p>
            <?php endif;?>
 
            <fieldset>
                <ul>
                    <?php foreach ($this->form->getFieldset($name) as $field) : ?>
                        <li><?php echo $field->label; ?><?php echo $field->input; ?></li>
                    <?php endforeach; ?>
                </ul>
            </fieldset>
            <?php echo JHtml::_('bootstrap.endTab'); ?>
        <?php endforeach; ?>
 
    <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
 </div>
</form>