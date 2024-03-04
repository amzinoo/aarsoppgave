<?php
getCalenderEvent();

function getCalenderEvent() {
    $eventId = isset($_GET['id']) ? $_GET['id'] : null;

    $calender = [
        //Shalom youth kalender
        [
            "id" => 1,
            "title" => "Nike Jordan 1",
            "paragraph" => "1999kr"    ],
            [
                "id" => 2,
                "title" => "Nike Jordan 1",
                "paragraph" => "1999kr"    ]
    ];

    $event = null;
    foreach ($calender as $item) {
        if ($item['id'] == $eventId) {
            $event = $item;
            break;
        }
    }

    if ($event) {
        echo "
        <div class='kalender-page-flex'>
            <div class='kalender-page-wrapper'>
                <div class='kalender-page-info'>
                    <h1>{$event['title']}</h1>
                    <p>{$event['paragraph']}</p>
                 
                   
                    </div>
                </div>
            </div>
        </div>";
    }
}
?>
