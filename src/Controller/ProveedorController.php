<?php
namespace App\Controller;

use App\Entity\Proveedor;
use App\Form\ProveedorType;
use App\Repository\ProveedorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/proveedores")
 */
class ProveedorController extends AbstractController
{
    /**
     * @Route("/", name="proveedor_index", methods={"GET"})
     */
    public function index(ProveedorRepository $repo): Response
    {
        return $this->render('proveedor/index.html.twig', [
            'proveedores' => $repo->findAllOrderedByName(),
        ]);
    }

    /**
     * @Route("/nuevo", name="proveedor_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $proveedor = new Proveedor();
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($proveedor);
            $em->flush();
            $this->addFlash('success', 'Proveedor creado correctamente.');
            return $this->redirectToRoute('proveedor_index');
        }

        return $this->render('proveedor/form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Nuevo Proveedor'
        ]);
    }

    /**
     * @Route("/{id}/editar", name="proveedor_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Proveedor $proveedor, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Proveedor actualizado correctamente.');
            return $this->redirectToRoute('proveedor_index');
        }

        return $this->render('proveedor/form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Editar Proveedor'
        ]);
    }

    /**
     * @Route("/{id}/eliminar", name="proveedor_delete", methods={"POST"})
     */
    public function delete(Request $request, Proveedor $proveedor, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proveedor->getId(), $request->request->get('_token'))) {
            $em->remove($proveedor);
            $em->flush();
            $this->addFlash('success', 'Proveedor eliminado correctamente.');
        }

        return $this->redirectToRoute('proveedor_index');
    }
}
