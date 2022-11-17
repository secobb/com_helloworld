<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Подключаем библиотеку контроллера Joomla.
jimport('joomla.application.component.controller');
 
// Получаем экземпляр контроллера с префиксом HelloWorld.
$controller = JControllerLegacy::getInstance('HelloWorld');
 
// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));
 
// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();