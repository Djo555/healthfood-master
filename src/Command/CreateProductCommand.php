<?php


namespace App\Command;


use App\Entity\Product;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Console\Command\Command;

use Symfony\Component\Console\Input\InputInterface;

use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Style\SymfonyStyle;





class CreateProductCommand extends Command

{

    protected static $defaultName = 'app:create-product';

    private $entityManager;



    public function __construct(EntityManagerInterface $entityManager)

    {

        parent::__construct();

        $this->entityManager = $entityManager;


    }


    protected function configure()

    {

        $this

            ->setName('app:create-product')

            ->setDescription('Create new product');

    }


    protected function execute(InputInterface $input, OutputInterface $output): int

    {

        $io = new SymfonyStyle($input, $output);

$products = [
    ["name"=>"IAFood","description"=>"Le complément alimentaire du futur","image1"=>"CA healthfood.jpg","image2"=>"CA2 healthfood.jpg","price"=>29.99],
    ["name"=>"IAFoodNew","description"=>"Le complément alimentaire du futur","image1"=>"CA healthfood.jpg","image2"=>"CA2 healthfood.jpg","price"=>49.99],
    ["name"=>"IAFoodSum","description"=>"Le complément alimentaire du futur","image1"=>"CA healthfood.jpg","image2"=>"CA2 healthfood.jpg","price"=>69.99],
    ["name"=>"IABoostFood","description"=>"Le complément boost du futur","image1"=>"CA boost.png","image2"=>"CA2 boost.png","price"=>89.99],
    ["name"=>"IACollNew","description"=>"Le complément collagene du futur","image1"=>"CA coll.png","price"=>109.99],
    ["name"=>"IAImperfSum","description"=>"Le complément anti-imperfections du futur","image1"=>"CA imperf.png","price"=>129.99],
] 
    ;

    foreach ($products as $item) { 

        $product = new Product();

        $product->setName($item['name']);

        $product->setDescription($item['description']);

        $product->setImage1($item['image1']);

        $product->setImage2($item["image2"]);

        $product->setPrice($item["price"]);

        $product->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($product);
    }

        $this->entityManager->flush();


        $io->success('Products created successfully.');


        return Command::SUCCESS;

    }

}