<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Session;

class FHouseFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_cannot_see_home_without_login()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/main');

        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_user_can_login_with_correct_credentials()
    {

        $response = $this->post('main/checklogin', [
            'email' => 'demo@financialhouse.io',
            'password' => 'cjaiU8CV',
        ]);

        $response->assertSee('Financial House Reporting', $escaped = true);
        

    }

    public function test_user_can_see_home_with_login()
    {
        // Token value has to be updated (there is an expiration ~10 min) don't forget to change token value
        $response = $this->withSession(['tokenApi' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXJjaGFudFVzZXJJZCI6NTMsInJvbGUiOiJ1c2VyIiwibWVyY2hhbnRJZCI6Mywic3ViTWVyY2hhbnRJZHMiOlszLDc0LDkzLDExOTEsMTI5NSwxMTEsMTM3LDEzOCwxNDIsMTQ1LDE0NiwxNTMsMzM0LDE3NSwxODQsMjIwLDIyMSwyMjIsMjIzLDI5NCwzMjIsMzIzLDMyNywzMjksMzMwLDM0OSwzOTAsMzkxLDQ1NSw0NTYsNDc5LDQ4OCw1NjMsMTE0OSw1NzAsMTEzOCwxMTU2LDExNTcsMTE1OCwxMTc5LDEyOTMsMTI5NCwxMzA2LDEzMDddLCJ0aW1lc3RhbXAiOjE1OTAxNTI0Nzl9.dh6TXZD6cRfggGqBp4cpqR_DQJ98QwUkf5bctIILVxs'])
                         ->get('/');

        $response->assertSee('Welcome', $escaped = false);


    }

    public function test_user_can_see_report_with_login()
    {
        
        // Token value has to be updated (there is an expiration ~10 min) don't forget to change token value
        $response = $this->withSession(['tokenApi' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXJjaGFudFVzZXJJZCI6NTMsInJvbGUiOiJ1c2VyIiwibWVyY2hhbnRJZCI6Mywic3ViTWVyY2hhbnRJZHMiOlszLDc0LDkzLDExOTEsMTI5NSwxMTEsMTM3LDEzOCwxNDIsMTQ1LDE0NiwxNTMsMzM0LDE3NSwxODQsMjIwLDIyMSwyMjIsMjIzLDI5NCwzMjIsMzIzLDMyNywzMjksMzMwLDM0OSwzOTAsMzkxLDQ1NSw0NTYsNDc5LDQ4OCw1NjMsMTE0OSw1NzAsMTEzOCwxMTU2LDExNTcsMTE1OCwxMTc5LDEyOTMsMTI5NCwxMzA2LDEzMDddLCJ0aW1lc3RhbXAiOjE1OTAxNTI0Nzl9.dh6TXZD6cRfggGqBp4cpqR_DQJ98QwUkf5bctIILVxs'])
                         ->get('/report');
        $response->assertSee('General Report', $escaped = true);
        
        

    }

    public function test_user_can_see_transactions_with_login()
    {
        
        // Token value has to be updated (there is an expiration ~10 min) don't forget to change token value
        $response = $this->withSession(['tokenApi' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXJjaGFudFVzZXJJZCI6NTMsInJvbGUiOiJ1c2VyIiwibWVyY2hhbnRJZCI6Mywic3ViTWVyY2hhbnRJZHMiOlszLDc0LDkzLDExOTEsMTI5NSwxMTEsMTM3LDEzOCwxNDIsMTQ1LDE0NiwxNTMsMzM0LDE3NSwxODQsMjIwLDIyMSwyMjIsMjIzLDI5NCwzMjIsMzIzLDMyNywzMjksMzMwLDM0OSwzOTAsMzkxLDQ1NSw0NTYsNDc5LDQ4OCw1NjMsMTE0OSw1NzAsMTEzOCwxMTU2LDExNTcsMTE1OCwxMTc5LDEyOTMsMTI5NCwxMzA2LDEzMDddLCJ0aW1lc3RhbXAiOjE1OTAxNTI0Nzl9.dh6TXZD6cRfggGqBp4cpqR_DQJ98QwUkf5bctIILVxs'])
                         ->get('/transactions');
        $response->assertSee('Transaction List', $escaped = true);
        
        

    }


}
