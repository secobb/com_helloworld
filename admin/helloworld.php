<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Устанавливаем обработку ошибок в режим использования Exception.
JError::$legacy = false;

// Подключаем хелпер.
JLoader::register('HelloWorldHelper', dirname(__FILE__) . '/helpers/helloworld.php');
 
// Устанавливаем некоторые глобальные свойства.
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-helloworld {background-image: url(../media/com_helloworld/images/hello-48x48.png); height:50px; width:50px}');

// Подключаем библиотеку контроллера Joomla.
jimport('joomla.application.component.controller');
 
// Получаем экземпляр контроллера с префиксом HelloWorld.
$controller = JControllerLegacy::getInstance('HelloWorld');
 
// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->get('task'));

// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();