<?php 

use IW\Workshop\PostService;
use IW\Workshop\Client\Curl;

class CreatePostCest
{
    private $postService;

    public function _before(ApiTester $I)
    {
        $client = new Curl();
        $this->postService = new PostService($client);
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
        $postData = [
            "id" => 101,
            "userId" => 5,
            "title" => "repellendus qui recusandae incidunt voluptates tenetur qui omnis exercitationem",
            "body"=>  "error suscipit maxime adipisci consequuntur recusandae\nvoluptas eligendi et est et voluptates\nquia distinctio ab amet quaerat molestiae et vitae\nadipisci impedit sequi nesciunt quis consectetur"
          ];
  
          $I->haveHttpHeader('Content-Type', 'application/json');
          
          $I->sendPOST('/posts', [
            json_encode($postData),
          ]);
  
          $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
          $I->seeResponseIsJson();
  
          $I->seeResponseContains($this->postService->createPost([
            $postData
          ]));

    }
}
