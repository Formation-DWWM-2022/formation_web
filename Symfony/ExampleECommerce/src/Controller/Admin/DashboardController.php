<?php

namespace App\Controller\Admin;

use App\Entity\Carrier;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(OrderCrudController::class)->generateUrl());
        
        // return parent::index();
        //    return $this->render('admin/dashboard/index.html.twig', [
        //         'dashboard_controller_filepath' => (new \ReflectionClass(static::class))->getFileName(),
        //         'dashboard_controller_class' => (new \ReflectionClass(static::class))->getShortName(),
        //     ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin Boutique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fas fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Orders', 'fas fa-shopping-cart', Order::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Product', 'fas fa-tag', Product::class);
        yield MenuItem::linkToCrud('Carriers', 'fas fa-truck', Carrier::class);
    }
}
