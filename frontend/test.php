<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll Blur Effect</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .content {
            height: 2000px; /* Make the page tall enough to scroll */
            background-color: #f0f0f0;
            padding: 20px;
        }

        #scrollableDiv {
            height: 300px;
            margin: 100px 0;
            overflow-y: scroll;
            background-color: #fff;
            border: 2px solid #ddd;
            padding: 10px;
            transition: filter 0.3s ease; /* Smooth transition for blur effect */
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="content">
    <div id="scrollableDiv">
        <p>Some content...</p>
        <p>More content...</p>
        <p>More content...</p>
        <p>More content...</p>
        <p>Even more content...</p>
        <p>Some extra content...</p>
        <p>More and more...</p>
    </div>
</div>

<script>
    window.addEventListener('scroll', function(){
        var scrollableDiv = document.getElementById('scrollableDiv');
        var scrollPosition = window.scrollY; // Current scroll position of the page
        var blurAmount = Math.min(scrollPosition / 50, 5); // Adjust blur intensity (max blur 5px)
        scrollableDiv.style.filter = `blur(${blurAmount}px)`; // Apply blur effect
    });
</script>

</body>
</html>
