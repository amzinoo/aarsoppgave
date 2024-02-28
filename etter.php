<?php
getCalenderEvent();

function getCalenderEvent() {
    $eventId = isset($_GET['id']) ? $_GET['id'] : null;

    $calender = [
        //Shalom youth kalender
        [
            "id" => 1,
            "dato" => "01.02.2024",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "17:00 - 20:00",
            "title" => "Tjeneste Kick off!",
            "paragraph" => "Dette er tjeneste kick off for alle i tjeneste i Youth/New creation (Obligatorisk). Gi informasjon til din nærmeste leder om du ikke kommer"
        ],
        [
            "id" => 2,
            "dato" => "17.02.2024",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "15:00 - 18:30",
            "title" => "James 1:27 Event!",
            "paragraph" => "Kommer mer info"
        ],
        [
            "id" => 3,
            "dato" => "22.03-2024",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "Mer info",
            "title" => "Påskekonferanse",
            "paragraph" => "Kommer mer info"
        ],
        [
            "id" => 4,
            "dato" => "08.06-2024",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "Mer info",
            "title" => "5 års markering",
            "paragraph" => "Kommer mer info"
        ],
        [
            "id" => 5,
            "dato" => "(07.02.2024) annenhver uke",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "18:00",
            "title" => "Bibelstudie",
            "paragraph" => ""
        ],
        [
            "id" => 6,
            "dato" => "(14.02.2024) annenhver uke",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "18:00",
            "title" => "Connect",
            "paragraph" => "Kommer mer info"
        ],
        [
            "id" => 7,
            "dato" => "(08.02.2024) annenhver uke",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "18:00 - 19:00",
            "title" => "Bønnemøte",
            "paragraph" => "For Youth & New creation"
        ],
        [
            "id" => 8,
            "dato" => "(16.02.2024) annenhver uke",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "18:00",
            "title" => "Evangelisering",
            "paragraph" => "For Youth & New creation"
        ],
        [
            "id" => 9,
            "dato" => "Hver lørdag",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "16:00 - 19:00",
            "title" => "Gudstjeneste",
            "paragraph" => "Velkommen til gudstjeneste hver lørdag klokken 16:00. Vi ber, lovsynger og lytter til Guds ord. Ta med en venn eller to og ta del i det Gud har for oss som fellesskap. Velkommen hjem!",

        ],
        [
            "id" => 10,
            "dato" => "(4 ukers program 27.02.2024) ",
            "lokasjon" => "St. Olavs Gate 24, Oslo",
            "clock" => "18:00 - 19:00",
            "title" => "Tjenestekurs",
            "paragraph" => "Kommer mer info"
        ]
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
                    <div class='kalender-page-details'>
                        <p>{$event['lokasjon']}</p>
                        <p>{$event['clock']}</p>
                    </div>
                   
                    </div>
                </div>
            </div>
        </div>";
    }
}
?>
