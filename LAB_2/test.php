<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<div class="container">
  <h2 class="my-4">Services</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Hall Number</th>
        <th>Description</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>Placeholder Id</td>
          <td><img src="<?= "Assets/1.jpg" ?>" alt="Service Image" style="max-width: 200px;"></td>
          <td>Placeholder name</td>
          <td>Placeholder number</td>
          <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, voluptate obcaecati. Vitae culpa beatae a autem quisquam magni modi eos deserunt commodi, optio alias sequi, aliquam soluta minus nostrum facere.</td>
          <td>Placeholder cost руб.</td>
        </tr>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>