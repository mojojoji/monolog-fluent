<?php

namespace FluentHandler\Tests;

use FluentHandler\FluentHandler;
use Monolog\Logger;

class FluentHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $record;

    protected function setUp()
    {
        $record = array();
        $record['channel']   = 'debug';
        $record['message']   = 'monolog.fluent';
        $record['context']   = array('foo' => 'bar');
        $record['formatted'] = 'formatted message';
        $record['level']     = Logger::DEBUG;

        $this->record = $record;
    }

    public function testWrite()
    {
        $data = $this->record;
        $data['level'] = Logger::getLevelName($data['level']);
        $tag  = $data['channel'] . '.' . $data['message'];
    
        $loggerMock = $this->getMockBuilder('Fluent\Logger\FluentLogger')
            ->disableOriginalConstructor()
            ->getMock();

        $loggerMock
            ->expects($this->once())
            ->method('post')
            ->with('debug.monolog.fluent', $data);

        $handler = new FluentHandler($loggerMock);
        $handler->write($this->record);
    }
}
