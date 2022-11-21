<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
?>
<tr>
    <th width="1%" class="nowrap center hidden-phone">
        <?php echo JHtml::_('grid.checkall'); ?>
    </th>
    <th>
        <?php echo JText::_('COM_HELLOWORLD_HELLOWORLD_HEADING_GREETING'); ?>
    </th>
    <th width="1%">
        <?php echo JText::_('COM_HELLOWORLD_HELLOWORLD_HEADING_ID'); ?>
    </th>
</tr>