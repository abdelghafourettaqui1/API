
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/homecss.css">

    <title>Document</title>
</head>
<body>
    <table>
    <?php foreach($data['students'] as $datavalue): ?>
    <tr>
    <td><?= $datavalue['id']." "?></td>
    <td><?=$datavalue['firstname']." "?></td>
    <td><?=$datavalue['lastname']." "?> </td>
    <td><?=$datavalue['gender']." "?></td>
    <td><?=$datavalue['age']."<br>"?></td>
    </tr>
    <?php endforeach; ?>
    </table>
    


   
</body>
</html>