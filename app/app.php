<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cars.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find a car!</h1>
                <form action='/view_cars'>
                    <div class='form-group'>
                        <label for='price'>Enter Maximum Price:</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='miles'>Enter Maximum Miles:</label>
                        <input id='miles' name='miles' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form>
            </div>

        </body>
        </html>
        ";

    });

    $app->get("/view_cars", function() {
        $porsche = new Car("2014 Porsche 911", 114991, 7864);
        $ford = new Car("2011 Ford F450", 55995, 14241);
        $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);
        $toyota = new Car("2007 Toyota Highlander", 15700, 99000);
        $bmw = new Car("2007 BMW 3 series", 25700, 59000);
        $cars = array($porsche, $ford, $lexus, $mercedes, $toyota, $bmw);
        $cars_matching_search = array();
        $output = " <h1>My Dealership</h1>";
        foreach ($cars as $car) {
            if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
            array_push($cars_matching_search, $car);
            }
          }


            if(empty($cars_matching_search))
          {
              return '<li>No car for you!</li>';
          }
          else {
          foreach ($cars_matching_search as $car) {
              $curModel = $car->getModel();
              $curPrice = $car->getPrice();
              $curMiles = $car->getMiles();

          $output = $output . "

                          <li>" . $curModel . "</li>
                          <ul>
                              <li>" . $curPrice . "</li>
                              <li> Miles: " . $curMiles . "</li>
                          </ul>
          ";
        }
        return $output;
      }
    });


      return $app;
  ?>













        // foreach ($cars as $car) {
        //     if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
        //         array_push($cars_matching_search, $car);
        //         if(empty($cars_matching_search))
        //         {
        //             return '<li>No car for you!</li>';
        //         }
        //         else {
        //         foreach ($cars_matching_search as $car) {
        //             $curModel = $car->getModel();
        //             $curPrice = $car->getPrice();
        //             $curMiles = $car->getMiles();
        //             return "
        //             <!DOCTYPE html>
        //             <html>
        //             <head>
        //                 <title>Your Car Dealership's Homepage</title>
        //             </head>
        //             <body>
        //                 <h1>Your Car Dealership</h1>
        //                 <ul><li>" . $curModel . "</li><ul><li>" . $curPrice . "</li><li> Miles: " . $curMiles . "</li></ul></ul>
        //             </body>
        //             </html>
        //             ";
        //         }
        //       }
        //     }
        // }
