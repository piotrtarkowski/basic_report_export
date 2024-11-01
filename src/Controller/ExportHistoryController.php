<?php

namespace App\Controller;

use App\Form\ExportHistoryFilterType;
use App\Repository\ExportHistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ExportHistoryController extends AbstractController
{

    private ExportHistoryRepository $exportHistoryRepository;
    
    public function __construct(ExportHistoryRepository $exportHistoryRepository)
    {
        $this->exportHistoryRepository = $exportHistoryRepository;
    }

    /**
     * @Route("/", name="app_export-history_list")
     */
    public function list(Request $request): Response
    {

        $filter = $this->filter($request);

        return $this->render('exportHistory/list.html.twig', [
            'filter' => $filter->createView(),
            'exportHistoryList' => $exportHistoryList,
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function filter(Request $request): array
    {
        $form = $this->createForm(ExportHistoryFilterType::class, null);

        $data = [];
        
        $form->handleRequest($request);
        if ($filter->isSubmitted() && $filter->isValid()) {
            $data = $filter->getData();
        }

        return $this->exportHistoryRepository->getList($data);
    }
}
