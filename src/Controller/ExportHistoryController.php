<?php

namespace App\Controller;

use App\Form\ExportHistoryFilterType;
use App\Repository\ExportHistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ExportHistoryController extends AbstractController
{

    /**
     * @Route("/", name="app_export-history_list")
     */
    public function list(Request $request, ExportHistoryRepository $exportHistoryRepository): Response
    {

        $filter = $this->filter($request);

        $data = [];
        if ($filter->isSubmitted() && $filter->isValid()) {
            $data = $filter->getData();
        }

        $exportHistoryList = $exportHistoryRepository->getList($data);

        return $this->render('exportHistory/list.html.twig', [
            'filter' => $filter->createView(),
            'exportHistoryList' => $exportHistoryList,
        ]);
    }

    private function filter(Request $request)
    {
        $form = $this->createForm(ExportHistoryFilterType::class, null);

        $form->handleRequest($request);

        return $form;
    }
}