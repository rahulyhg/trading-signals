<?php
/**
 * Created by PhpStorm.
 * User: roee
 * Date: 1/11/2016
 * Time: 4:44 PM
 */
namespace System\Command\Merchant;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use System\Entity\Assets;
use System\Entity\Merchants;
use System\Entity\MerchantsSignals;
use System\Entity\Signals;
use System\Helpers\Arr;

class ArchiveSignalsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('merchant:archive:signals')
            ->setDescription('Archive merchant signals (options)');;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $doctrine Registry
         */
        $allocate = $this->getContainer()->get('merchants.archive_signals');

        // Attach options to signals
        $allocate->archiveAllOpenTrades();
    }
}
