<?php
declare(strict_types=1);

namespace CakeLte\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * MenuLte helper
 */
class MenuLteHelper extends Helper
{
    public $helpers = ['Html', 'Url'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        'itemIcon' => [
            1 => 'fas fa-circle',
            2 => 'far fa-circle',
            3 => 'far fa-dot-circle',
            'default' => 'fas fa-flag',
        ],
        'dropdownIconDefault' => 'fas fa-angle-left',
        'defaultShowItem' => true,
    ];

    protected array $_activeItems = [];

    /**
     * @todo set cache
     * 
     * Menu Example
     * $menu = [
     *     'startPages' => [
     *         'label' => 'Start Pages',
     *         'icon' => 'fas fa-tachometer-alt',
     *         'dropdown' => [
     *             'activePage' => [
     *                 'label' => 'Active Page',
     *                 'uri' => ['controller' => 'Pages', 'action' => 'display', 'home'],
     *             ],
     *             'inactivePage' => [
     *                 'label' => 'Inactive Page',
     *                 'uri' => ['controller' => 'Pages', 'action' => 'display', 'home'],
     *             ],
     *         ],
     *     ],
     *     'simpleLink' => [
     *         'label' => 'Simple Link',
     *         'extra' => '<span class="right badge badge-danger">New</span>',
     *         'uri' => ['controller' => 'Pages', 'action' => 'display', 'home'],
     *         'show' => function() {
     *             // logic condition to show item, return a bool
     *             return true;
     *         }
     *     ],
     * ];
     * 
     * @param array $menu
     * @param boolean $cache
     * @return string
     */
    public function render(array $menu, $cache = false): string
    {
        //$menu = $this->checkTree($menu);

        $output = '';
        foreach ($menu as $tag => $item) {
            $output .= $this->renderItem($tag, $item, 1);
        }

        return $output;
    }
    
    /**
     * @param string $tag
     * @param array $item
     * @param integer $level
     * @return string
     */
    protected function renderItem(string $tag, array $item, int $level): string
    {
        if(!$this->checkShowCondition($item['show'] ?? $this->getConfig('defaultShowItem'))) {
            return '';
        }

        $classItem = ['nav-item'];
        $classLink = ['nav-link'];
        $dropdownIcon = null;
        $dropdown = '';
        $isActive = isset($item['active']) && $item['active'] || $this->checkActiveItem($tag);
        $isDropdown = isset($item['dropdown']) && is_array($item['dropdown']);
        
        if ($isActive) {
            $classLink[] = 'active';
        }

        if ($isDropdown) {
            $classItem[] = 'has-treeview';
            $link = '#';
            $dropdownIcon = $this->getConfig('dropdownIconDefault');
            $dropdown = $this->renderDropdown($item['dropdown'], $level+1);
            if ($isActive) {
                $classItem[] = 'menu-open';
            }
        }

        $link = empty($item['uri']) ? '#' : $this->Url->build($item['uri']);
        $icon = $item['icon'] ?? $this->getConfig('itemIcon')[$level] ?? $this->getConfig('itemIcon')['default'];
        $label = $item['label'] ?? $tag;

        // print
        $output = '';
        $output .= '<li class="' . implode(' ', $classItem) . '">';
        $output .= '<a href="' . $link . '" class="' . implode(' ', $classLink) . '">';
        $output .= '<i class="nav-icon ' . $icon . '"></i>';
        $output .= '<p>' . $label;
        $output .= $item['extra'] ?? '';
        $output .= $dropdownIcon ? '<i class="right ' . $dropdownIcon . '"></i>' : '';
        $output .= '</p>';
        $output .= '</a>';
        $output .= $dropdown;
        $output .= '</li>';
        // /print

        return $output;
    }

    /**
     * @param array $items
     * @param integer $level
     * @return string
     */
    protected function renderDropdown(array $items, int $level): string
    {
        $output = '';
        $output .= '<ul class="nav nav-treeview">';
        foreach ($items as $tag => $item) {
            $output .= $this->renderItem($tag, $item, $level);
        }
        $output .= '</ul>';

        return $output;
    }

    /**
     * @param bool|callable $show
     * @return boolean
     */
    protected function checkShowCondition($show): bool
    {
        if (is_bool($show)) {
            return $show;
        }
        if (is_callable($show)) {
            return $show();
        }

        return $this->getConfig('defaultShowItem');
    }

    /**
     * @param string $itemTag
     * @return void
     */
    public function activeItem(string $itemTag): void
    {
        array_push($this->_activeItems, $itemTag);
    }

    /**
     * @param string $tag
     * @return boolean
     */
    protected function checkActiveItem(string $tag): bool
    {
        foreach ($this->_activeItems as $active) {
            $arrayActive = explode('.', $active);
            if (in_array($tag, $arrayActive)) {
                return true;
            }
        }
        
        return false;
    }
}
