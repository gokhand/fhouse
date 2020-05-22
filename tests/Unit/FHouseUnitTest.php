<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Util\FHousePost;
use GuzzleHttp\Client;
use Session;

class FHouseUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    protected function setUp(): void
    {
        $client = new Client([
            'base_uri' => 'https://sandbox-reporting.rpdpymnt.com',
            'http_errors' => false
        ]);
        $this->post = new FhousePost($client);
    }

    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testLoginTest()
    {
        
        $login_status = $this->post->login('demo@financialhouse.io','cjaiU8CV');
        $success_check = $login_status->status;

        $this->assertEquals($success_check, "APPROVED");

    }

    public function testLoginFailedTest()
    {
        
        $login_status = $this->post->login('test@test.com','1234545');
        $success_check = $login_status->status;

        $this->assertEquals($success_check, "DECLINED");

    }
}
