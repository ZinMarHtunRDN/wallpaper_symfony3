<?php

namespace spec\AppBundle\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Filesystem\Filesystem;

class FileMoverSpec extends ObjectBehavior
{
    private $filesystem;

    function let(Filesystem $fs)
    {
//        exit(\Doctrine\Common\Util\Debug::dump($fs));
        $this->filesystem = $fs;
        $this->beConstructedWith($fs);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AppBundle\Service\LocalFileSystemFileMover');
    }

    function it_can_move_a_file_from_temporary_to_controlled_storage()
    {
        $currentLocation = 'some/fake/temp/path';
    	$newLocation = 'some/fake/real/path';
    	$this->move($currentLocation, $newLocation)->shouldReturn(true);
    	$this->filesystem->rename($currentLocation, $newLocation)->shouldHaveBeenCalled();
    }
}