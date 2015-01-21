/* Navigation between the information shown on the Logistics page */
$('#Plane').click(function(e){    
    $('#DirectionsByTube, #DirectionsByRail, #DirectionsByCar, #DirectionsByCableCar, #DirectionsByBoat').fadeOut('slow', function(){
        $('#DirectionsByPlane').fadeIn('slow');
    });
});

$('#Tube').click(function(e){    
    $(' #DirectionsByPlane, #DirectionsByRail, #DirectionsByCar, #DirectionsByCableCar, #DirectionsByBoat').fadeOut('slow', function(){
        $('#DirectionsByTube').fadeIn('slow');
    });
});
$('#Rail').click(function(e){    
    $(' #DirectionsByPlane, #DirectionsByTube, #DirectionsByCar, #DirectionsByCableCar, #DirectionsByBoat').fadeOut('slow', function(){
        $('#DirectionsByRail').fadeIn('slow');
    });
});
$('#Car').click(function(e){    
    $(' #DirectionsByPlane, #DirectionsByTube, #DirectionsByRail, #DirectionsByCableCar, #DirectionsByBoat').fadeOut('slow', function(){
        $('#DirectionsByCar').fadeIn('slow');
    });
});

$('#CableCar').click(function(e){    
    $(' #DirectionsByPlane, #DirectionsByTube, #DirectionsByRail, #DirectionsByCar, #DirectionsByBoat').fadeOut('slow', function(){
        $('#DirectionsByCableCar').fadeIn('slow');
    });
});

$('#Boat').click(function(e){    
    $(' #DirectionsByPlane, #DirectionsByTube, #DirectionsByRail, #DirectionsByCar, #DirectionsByCableCar').fadeOut('slow', function(){
        $('#DirectionsByBoat').fadeIn('slow');
    });
});


