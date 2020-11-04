<?php

namespace Tests\Feature;

use App\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // public function testHasItemInBox(){
    //     $box=new Box(['cat','dog','frog']);
    //     $this->assertTrue($box->has('cat'));
    //     $this->assertTrue($box->has('tanin'));
    // }
    // public function testTakeOneFromTheBox(){
    //     $box =new Box(['cat','dog','frog']);
    //     $box1= new Box([]);
    //     $this->assertEquals('cat',$box->takeOne());
    //     $this->assertNull($box1->takeOne()); 
    // }
    public function testStartsWithLetter(){
        $box =new Box(['cat','dog','frog','lion','cow']);
        $result=$box->startsWith('c');
        $this->assertCount(2 ,$result);
        $this->assertContains('cow',$result);
        $this->assertEmpty($box->startsWith('s'));
    }
}
