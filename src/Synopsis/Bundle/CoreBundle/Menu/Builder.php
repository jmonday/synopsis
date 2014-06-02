<?php

namespace Synopsis\Bundle\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Class Builder
 *
 * @package Synopsis\Bundle\CoreBundle\Menu
 */
class Builder extends ContainerAware
{

    /**
     * Build the main menu.
     *
     * @param FactoryInterface $factory
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     */
    public function mainMenu ( FactoryInterface $factory, array $options )
    {
        $menu = $factory->createItem('root');

        // Homepage
        $menu->addChild('_homepage', [
            'label' => 'Home',
            'route' => '_homepage',
        ]);

        // Events Menu
        $menu->addChild('event_index', [
            'label' => 'Events',
            'route' => 'event_index',
        ]);

        // Subjects Menu
        $menu
            ->addChild('subject_index', [
                'label' => 'Subjects',
                'route' => 'subject_index',
            ])
            ->addChild('subject_new', [
                'label' => 'New Subject',
                'route' => 'subject_new',
            ])->getParent()
            ->addChild('subject_action_index', [
                'label' => 'Actions',
                'route' => 'subject_action_index'
            ])
            ->addChild('action_new', [
                'label' => 'New Action',
                'uri' => '#'
            ])->getParent()->getParent()
            ->addChild('type_index', [
                'label' => 'Types',
                'uri' => '#',
            ])
            ->addChild('type_new', [
                'label' => 'New Type',
                'uri' => '#'
            ])
        ;

        // User Menu
        $menu
            ->addChild('Account', [
                'route' => 'fos_user_profile_show',
            ])
            ->addChild('Change Password', [
                'route' => 'fos_user_change_password',
            ])->getParent()
            ->addChild('Edit Profile', [
                'route' => 'fos_user_profile_edit',
            ])->getParent()
            ->addChild('Logout', [
                'route' => 'fos_user_security_logout',
            ])
        ;

        return $menu;
    }

}
