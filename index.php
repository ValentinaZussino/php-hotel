<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    if(isset($_GET['parking']) && !empty($_GET['parking'])){
        $park = $_GET['parking'];
        if($park == 'true'){
            $hotels = array_filter($hotels, fn($value)=>$value['parking']);
        }else{
            $hotels = array_filter($hotels, fn($value)=>!$value['parking']);
        }
        
        // var_dump($hotels);
    };
    if(isset($_GET['vote']) && !empty($_GET['vote'])){
        $vote = $_GET['vote'];
        $hotels = array_filter($hotels, fn($value)=>$value['vote'] >= $vote);
        // var_dump($hotels);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Hotels</title>
</head>
<body>
    <div class="vz_container">
        <h1 class="pb-5">Hotels</h1>
        <!-- <?php 
        foreach($hotels as $hotel){
            foreach($hotel as $key=>$value){
                echo '<div>'. $key . ' : ' . $value .'</div>' ;
            }
        }
        ?> -->
        <!-- <br><br> -->

        <!-- select -->
        <form class="mb-5" action="index.php" method="GET">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <label class="mr-sm-2" for="parking">Preferenze sul parcheggio</label>
                    <select class="custom-select mr-sm-2 me-3" id="parking" name="parking">
                        <option value="" selected>Scegli...</option>
                        <option value="true">Con parcheggio</option>
                        <option value="false">Senza parcheggio</option>
                    </select>
                    <label class="mr-sm-2" for="vote">Preferenze sulla valutazione</label>
                    <select class="custom-select mr-sm-2" id="vote" name="vote">
                        <option value="" selected>Scegli...</option>
                        <option value="1">1 stella</option>
                        <option value="2">2 stelle</option>
                        <option value="3">3 stelle</option>
                        <option value="4">4 stelle</option>
                        <option value="5">5 stelle</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </div>
            </div>
        </form>

        <!-- table -->
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance from center</th>
                </tr>
            </thead>

            <?php foreach($hotels as $hotel){ ?>
            <tbody>
                <tr>
                    <td scope="row"><?php echo $hotel['name'] ?></td>
                    <td><?php echo $hotel['description'] ?></td>
                    <td><?php echo $hotel['parking'] ?></td>
                    <td><?php echo $hotel['vote'] ?></td>
                    <td><?php echo $hotel['distance_to_center'] .' km'?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</body>
</html>