<?php 

use IW\Workshop\Client\Curl;

class PostTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
      $client = new Curl();
      $postService = new PostService($client);
    }

    public function createUserViaAPI(\ApiTester $I)
    {
        $postData = [];
        //$I->amHttpAuthenticated('service_user', '123456');
        //https://codeception.com/docs/10-APITesting
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGET('https://jsonplaceholder.typicode.com/posts', [
          json_encode($postData),
        ]);
        
        
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"id": 1}');
        
    }

    protected function _after()
    {
    }

}