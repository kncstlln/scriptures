<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;

function getBooks() {
    $token = 'aedeec30db6207585290f2b091b4a59eb50cc4fdca5b3feb763245c2458289f3eaee469c3d1a7de59a22375753ac297d1cc17a5b8a6da31526da2b39e02121cf0a36c4c2f62368d7f6408360f337256ba4799f283d6a1b53a4c66e5b5daf59e7c7c5a42de54d5308d25ec96f13cc154c4651634b35c7a182538213fed62f8d3f';

    $client = new Client([
        'base_uri' => 'http://localhost:1337/api/',
    ]);

    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept'        => 'application/json',
    ];

    $response = $client->request('GET', 'books?pagination[pageSize]=66', [
        'headers' => $headers
    ]);

    $body = $response->getBody();
    $decoded_response = json_decode($body);
    return $decoded_response;
}

$books = getBooks();

?>
<hmtl>

    <title> IPT10 </title>
    <h1> IPT10 Scriptures </h1>
    <h2><a href = "#"><u> Castillano, Kane Erryl G. </u></a></h2>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Summary</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
    <?php
     foreach($books->data as $bookData){ 
        $book = $bookData->attributes;?>
    <tr>
      <td><?=$bookData->id?></td>
      <td><?=$book->name?></td>
      <td><?=$book->author?></td>
      <td><?=$book->category?></td>
    </tr>
     <?php }  ?>
  </tbody>
</table>
</body>
</html>