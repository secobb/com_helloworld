<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

 
// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');
 
/**
 * HTML представление списка сообщений компонента HelloWorld.
 */
class HelloWorldViewHelloWorlds extends JViewLegacy
{
    /**
     * Сообщения.
     *
     * @var  array 
     */
    protected $items;
 
    /**
     * Постраничная навигация.
     *
     * @var  object
     */
    protected $pagination;

    /**
	 * The sidebar markup
	 *
	 * @var  string
	 */
	protected $sidebar;
 
    /**
     * Отображаем список сообщений.
     *
     * @param   string  $tpl  Имя файла шаблона.
     *
     * @return  void
     *
     * @throws  Exception
     */
    public function display($tpl = null)
    {
        try
        {
            // Получаем данные из модели.
            $this->items = $this->get('Items');
 
            // Получаем объект постраничной навигации.
            $this->pagination = $this->get('Pagination');

            $this->addToolbar();
			$this->sidebar = JHtmlSidebar::render();
 
            // Отображаем представление.
            parent::display($tpl);
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    /**
      * Устанавливает панель инструментов.
      *
      * @return void
      */
      protected function addToolBar()
      {
          JToolBarHelper::title(JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLDS'), 'helloworld');
          JToolBarHelper::addNew('helloworld.add');
          JToolBarHelper::editList('helloworld.edit');
          JToolBarHelper::deleteList('JGLOBAL_CONFIRM_DELETE', 'helloworlds.delete');
          JToolBarHelper::preferences('com_helloworld');
      }
}