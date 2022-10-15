<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;


function getBooks() {
$token='bf04c1fce3de88d595fd160758d362ddbf3a58e292164d8fdf0892bcf5002e85e68e543fe34503581e2b28f2c86dbd110c9ef3e0e5e1186fb93f18daa2bd3a361cee57ca15e847225382ff8578f8660fd2e083c98df972eb8161bd72a31ced825c56ef697628cb235488c7d513ebdb6a1d88aafbb509a509cb3a525a1d65816a';
$client = new Client([
    'base_uri'=>'http://localhost:1337/api/'
]);
$headers = [
  'Authorization' => 'Bearer ' . $token,
  'Accept' => 'application/json'
];

$response = $client->request('GET', 'bibles', ['headers' => $headers]);
$body = $response->getBody();
var_dump (json_decode($body));
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
    foreach ($books->data as $bookList){
        $book = $bookList->attributes;

    ?>
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





