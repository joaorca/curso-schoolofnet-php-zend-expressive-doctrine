<?php


namespace App\Action;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;


class ProductListAction implements MiddlewareInterface
{

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * ProductListAction constructor.
     * @param TemplateRendererInterface $template
     * @param EntityManager             $entityManager
     */
    public function __construct(TemplateRendererInterface $template, EntityManager $entityManager)
    {
        $this->template      = $template;
        $this->entityManager = $entityManager;
    }

    /**
     * Process an incoming server request and return a response, optionally delegating
     * to the next middleware component to create the response.
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface      $delegate
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        /*
        $product = new Product();
        $product->name = 'Celular';
        $product->price = 999.99;
        $product->description = 'Um celular de qualquer marca';
        $this->entityManager->persist($product);
        $this->entityManager->flush();
        */

        $repository = $this->entityManager->getRepository(Product::class);
        $products = $repository->findAll();
        return new HtmlResponse($this->template->render('app::products/list', ['products' => $products]));
    }
}
