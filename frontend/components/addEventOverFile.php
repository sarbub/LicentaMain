<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close" />
<link rel="stylesheet" href="../frontend/components/components_css/addEventsOverFile.css">
<div class="mainOverFileEvent">
    <div class="insideMainEvent">
        <span class="material-symbols-outlined" id="event_close_btn">
            close
        </span>
        <form action="../backend/add_event_backend.php" method="POST">
            <span>
            <input id="event_name" name="event_name" type="text" placeholder="Enter event name">
            <input id="event_date" name="event_date" type="date">
            </span>
            <textarea id="event_description" placeholder="Describe the event..." name="Event_description" id=""></textarea>
            <button type="submit">create event</button>
        </form>
    </div>
</div>