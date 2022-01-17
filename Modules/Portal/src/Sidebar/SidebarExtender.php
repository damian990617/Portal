<?php

namespace Modules\Portal\src\Sidebar;

use Modules\Admin\src\Sidebar\AbstractAdminSidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Bouncer;
use Modules\Portal\Entities\Offer;
use Modules\Portal\Entities\OfferCategory;

class SidebarExtender extends AbstractAdminSidebar
{
    public function extendWith(Menu $menu): object
    {
        $canOffer = Bouncer::can('index', Offer::class);
        $canOfferCategory = Bouncer::can('index', OfferCategory::class);
        if ($canOffer || $canOfferCategory) {
            $menu->group($this->getModuleName(), function (Group $group) use ($canOffer, $canOfferCategory) {
                $group->item('Portal', function (Item $item) use ($canOffer, $canOfferCategory) {
                    $item->icon('fa fa-cog');
                    if ($canOffer) {
                        $item->item('Offers', function (Item $item) {
                            $item->route($this->adminRoute('portal.offers.index'));
                            $item->icon('');
                        });
                    }
                    if ($canOfferCategory) {
                        $item->item('Categories', function (Item $item) {
                            $item->route($this->adminRoute('portal.categories.index'));
                            $item->icon('');
                        });
                    }
                });
            });

        }
        return $menu;
    }

}
