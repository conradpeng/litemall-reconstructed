<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->post('wx/auth/register', [
            'username'=>'pk5',
            'password'=>'123456',
            'mobile'=>'13121224242',
            'code'=>'32141'
        ]);
        echo $response->getContent();
        $response->assertStatus(200);
        $ret = $response->getOriginalContent();
        $this->assertEquals(0, $ret['errno']); //断言结果errno等于0
        $this->assertNotEmpty($ret['data']); // 断言data有数据
    }

    public function testRegisterMobile()
    {
        $response = $this->post('wx/auth/register', [
            'username'=>'pk5',
            'password'=>'123456',
            'mobile'=>'131212242422323232',
            'code'=>'32141'
        ]);
        echo $response->getContent();
        $response->assertStatus(200);
        $ret = $response->getOriginalContent();
        $this->assertEquals(707, $ret['errno']); //断言结果errno等于0
    }
}
