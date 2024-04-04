<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\DeliveryCalculationForm;
use App\Service\Delivery\DeliveryManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeliveryController extends AbstractController
{

    #[Route('/get-delivery-price', name: "home")]
    public function getDeliveryPrice(Request $request, DeliveryManager $deliveryManager): Response
    {
        $form = $this->createForm(DeliveryCalculationForm::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $weight = (float) $form->get('weight')->getData();
            $calculator = $deliveryManager->getDeliveryCalculator($form->get('slug')->getData());

            $this->addFlash('success', "Delivery price: {$calculator->calculatePrice($weight)}");

            return $this->render(
                'delivery-calculation.html.twig',
                [
                    'form' => $form->createView(),
                ]
            );
        }

        return $this->render('delivery-calculation.html.twig', ['form' => $form->createView()]);
    }
}
