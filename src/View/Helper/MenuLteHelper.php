<?php
declare(strict_types=1);

namespace CakeLte\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

/**
 * MenuLte helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\UrlHelper $Url
 */
class MenuLteHelper extends Helper
{
    use StringTemplateTrait;

    public array $helpers = ['Html', 'Url'];

    public const ITEM_TYPE_HEADER = 'header';
    public const ITEM_TYPE_DEFAULT = 'default';

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [
        'itemIcon' => [
            1 => 'fas fa-circle',
            2 => 'far fa-circle',
            3 => 'far fa-dot-circle',
            'default' => 'fas fa-flag',
        ],
        'defaultDropdownIcon' => 'fas fa-angle-left',
        'defaultBadgeColor' => 'secondary',
        'defaultShowItem' => true,
        'cssClass' => [
            'navItem' => 'nav-item',
            'navLink' => 'nav-link',
            'activeItem' => 'active',
            'itemDropdown' => 'has-treeview',
            'menuOpen' => 'menu-open',
            'navHeader' => 'nav-header',
            'dropdown' => 'nav nav-treeview',
        ],
        'templates' => [
            'itemMenu' => '<li class="{{class}}">{{itemLink}}{{dropdownWrap}}</li>',
            'itemLink' => '{{content}}',
            'itemLinkTarget' => '{{itemIcon}}<p>{{label}}{{badge}}{{dropdownIcon}}</p>',
            'itemIcon' => '<i class="nav-icon {{icon}}"></i>',
            'dropdownWrap' => '<ul class="nav nav-treeview">{{items}}</ul>',
            'dropdownIcon' => '<i class="right {{icon}}"></i>',
            'badge' => '<span class="{{badgeClass}} right">{{text}}</span>',
            'itemHeader' => '<li class="{{class}}">{{label}}</li>',
        ],
    ];

    /**
     * @var array
     */
    protected array $_activeItems = [];

    /**
     * @inheritDoc
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->checkActiveFromComponent();
    }

    /**
     * Menu Example
     *
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
     * @return string
     */
    public function render(array $menu): string
    {
        $output = '';
        foreach ($menu as $tag => $item) {
            $output .= $this->renderItem($tag, $item, 1);
        }

        return $output;
    }

    /**
     * @param array $menu
     * @return string
     */
    public function renderTopMenu(array $menu): string
    {
        $this->setConfig('cssClass', [
            'navItem' => 'nav-item',
            'navLink' => 'nav-link',
            'activeItem' => 'active',
            'itemDropdown' => 'has-treeview',
            'menuOpen' => 'menu-open',
            'navHeader' => 'nav-header',
            'dropdown' => 'nav nav-treeview',
        ], true);

        $this->setTemplates([
            'itemMenu' => '<li class="{{class}}">{{itemLink}}{{dropdownWrap}}</li>',
            'itemLink' => '{{content}}',
            'itemLinkTarget' => '{{itemIcon}}<p>{{label}}{{badge}}{{dropdownIcon}}</p>',
            'itemIcon' => '<i class="nav-icon {{icon}}"></i>',
            'dropdownWrap' => '<ul class="nav nav-treeview">{{items}}</ul>',
            'dropdownIcon' => '<i class="right {{icon}}"></i>',
            'badge' => '<span class="{{badgeClass}} right">{{text}}</span>',
            'itemHeader' => '',
        ]);

        return $this->render($menu);
    }

    /**
     * @param string $tag
     * @param array $item
     * @param int $level
     * @return string
     */
    protected function renderItem(string $tag, array $item, int $level): string
    {
        if (!$this->checkShowCondition($item['show'] ?? $this->getConfig('defaultShowItem'))) {
            return '';
        }

        if (isset($item['type']) && $item['type'] === static::ITEM_TYPE_HEADER) {
            return $this->formatItemHeader($tag, $item);
        }

        $classItem = [$this->getConfig('cssClass.navItem')];
        $classLink = [$this->getConfig('cssClass.navLink')];
        $dropdownIcon = null;
        $dropdownWrap = null;
        $isActive = isset($item['active']) && $item['active'] || $this->checkActiveItem($tag);
        $isDropdown = isset($item['dropdown']) && is_array($item['dropdown']);

        if ($isActive) {
            $classLink[] = $this->getConfig('cssClass.activeItem');
        }

        if ($isDropdown) {
            $classItem[] = $this->getConfig('cssClass.itemDropdown');
            $dropdownIcon = $this->formatTemplate('dropdownIcon', ['icon' => $this->getConfig('defaultDropdownIcon')]);
            $dropdownWrap = $this->formatTemplate('dropdownWrap', ['items' => $this->renderItems($item['dropdown'], $level + 1)]);
            if ($isActive) {
                $classItem[] = $this->getConfig('cssClass.menuOpen');
            }
        }

        $icon = $item['icon'] ?? $this->getConfig('itemIcon')[$level] ?? $this->getConfig('itemIcon')['default'];
        $itemIcon = $this->formatTemplate('itemIcon', ['icon' => $icon]);

        $label = $item['label'] ?? $tag;

        $itemLinkTarget = $this->formatTemplate('itemLinkTarget', [
            'itemIcon' => $itemIcon,
            'label' => $label,
            'badge' => $this->formatBadge($item['badge'] ?? null),
            'dropdownIcon' => $dropdownIcon,
        ]);

        $itemLink = $this->Html->link($itemLinkTarget, $item['uri'] ?? '#', [
            'class' => $classLink,
            'escape' => false,
        ]);

        return $this->formatTemplate('itemMenu', [
            'class' => implode(' ', $classItem),
            'dropdownWrap' => $dropdownWrap,
            'itemLink' => $itemLink,
        ]);
    }

    /**
     * @param array $items
     * @param int $level
     * @return string
     */
    protected function renderItems(array $items, int $level): string
    {
        $output = '';
        foreach ($items as $tag => $item) {
            $output .= $this->renderItem($tag, $item, $level);
        }

        return $output;
    }

    /**
     * @param array|string|null $itemBadge
     * @return string
     */
    protected function formatBadge(string|array|null $itemBadge = null): string
    {
        if (empty($itemBadge)) {
            return '';
        }

        $text = is_string($itemBadge) ? $itemBadge : $itemBadge['text'];
        if (empty($text)) {
            return '';
        }

        $badgeClass = 'badge badge-' . trim($itemBadge['color'] ?? $this->getConfig('defaultBadgeColor'));

        return $this->formatTemplate('badge', [
            'badgeClass' => $badgeClass,
            'text' => $text,
        ]);
    }

    /**
     * @param string $tag
     * @param array $item
     * @return string
     */
    protected function formatItemHeader(string $tag, array $item): string
    {
        $label = $item['label'] ?? $tag;

        return $this->formatTemplate('itemHeader', [
            'class' => $this->getConfig('cssClass.navHeader'),
            'label' => $label,
        ]);
    }

    /**
     * @param callable|bool $show
     * @return bool
     */
    protected function checkShowCondition(bool|callable $show): bool
    {
        if (is_callable($show)) {
            return $show();
        }

        return $show;
    }

    /**
     * @param string $itemTag
     * @param bool $reset
     * @return self
     */
    public function activeItem(string $itemTag, bool $reset = false): self
    {
        if ($reset) {
            $this->resetActiveItem();
        }

        array_push($this->_activeItems, $itemTag);

        return $this;
    }

    /**
     * @return self
     */
    public function resetActiveItem(): self
    {
        $this->_activeItems = [];

        return $this;
    }

    /**
     * @param string $tag
     * @return bool
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

    /**
     * @return void
     */
    protected function checkActiveFromComponent(): void
    {
        $_menuActiveItem = $this->getView()->get('_menuActiveItem', null);

        if (!empty($_menuActiveItem)) {
            $this->activeItem($_menuActiveItem);
        }
    }
}
