<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>Chuck Norris Jokes API</h1>

  <?php
  $url = "https://api.chucknorris.io/jokes/random";
  $response = file_get_contents($url);
  $data = json_decode($response, true);

  echo "<h2>Chiste aleatorio</h2>";
  echo "<p>{$data['value']}</p>";
  echo "<p>Categoría: ";
  if (count($data['categories']) > 0) {
    echo $data['categories'][0];
  } else {
    echo "Sin categoría";
  }
  echo "</p>";
  echo "<p>Fecha de actualización: {$data['updated_at']}</p>";

  $url = "https://api.chucknorris.io/jokes/categories";
  $response = file_get_contents($url);
  $data = json_decode($response, true);

  echo "<h2>Lista de categorías</h2>";
  foreach ($data as $category) {
    $categoria = "https://api.chucknorris.io/jokes/random?category=" . urlencode($category);
    echo "<p><a href=\"$categoria\">$category</a></p>";
  }

  if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $url = "https://api.chucknorris.io/jokes/search?query=" . urlencode($keyword);
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    echo "<h2>Chiste aleatorio con la palabra clave '$keyword'</h2>";
    if ($data['total'] == 0) {
      echo "No se encontraron resultados para '$keyword'.";
    } else {
      $broma_aleatoria = $data['result'][rand(0, count($data['result']) - 1)];
      echo "<p>{$broma_aleatoria['value']}</p>";
      echo "<p>Categoría: ";
      if (count($broma_aleatoria['categories']) > 0) {
        echo $broma_aleatoria['categories'][0];
      } else {
        echo "Sin categoría";
      }
      echo "</p>";
      echo "<p>Fecha de actualización: {$broma_aleatoria['updated_at']}</p>";
    }
  }
  ?>

  <h2>Buscar chistes por palabra clave</h2>
  <form method="get">
    <label for="keyword">Palabra clave:</label>
    <input type="text" id="keyword" name="keyword">
    <button type="submit">Buscar</button>
  </form>
</body>
</html>