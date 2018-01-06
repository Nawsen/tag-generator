<!DOCTYPE html>
<!---------------------------------------------
|                                             |
|           Coded by : Wannes Van Dorpe       |
|                                             |
----------------------------------------------->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create bdb TAG</title>
        <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="scriptkid.js"></script>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="message">
            
        </div>
        <div id="first">
            <form action="">
                <label>Name : </label>
                <input type="text" name="name" placeholder="Name"id="name">
                <br>
                <label>Job : </label>
                <input type="text" name="job" placeholder="Job" id="job">
                <br>
                <label> Email : </label>
                <input type="text" name="email" placeholder="XXX@balderbals.be" id ="email">
                <br>
                <label> GSM : </label>
                <input type="text" name="gsm" placeholder="04 xx xxxx xx" id ="gsm">
                <br>
                <button id="submit" type="button" onclick="add()">Create</button>
                <a id="downloadKaart"><a id="downloadSign"></a></a><button id="downloadButton"type="button">Download Images</button>
                <footer>| <a id ="dev" href="http://www.wannesvandorpe.be" target="_blank">Developer</a> | <a id="help" href="#"onclick="help()" >Help</a> |</footer>
            </form>
        </div>
        <div id="helpBox">
            <ul>
                <li>Q: Create button doesn't work?</li>
                <li>A: Make sure everything is filled in correctly and javascript is enabled.</li>
                <li>Q: A red bar appears on top of the page?</li>
                <li>A: Make sure everything is filled in correctly.</li>
                <li>Q: Download button only downloads 1 image?</li>
                <li>A: You have to allow your browser to download 2 images at once, most recent browsers will ask you if you try this.</li>
                <li>Q: My browser doesn't ask me to download both images?</li>
                <li>A: Right-click the image you wish to download and chose "Save image as ..." .</li>
                <p>For all other questions you can contact the developer <a href="http://www.wannesvandorpe.be" target="_blank">here</a>.</p>
            </ul>
            <a href="#" onclick="back()"id="return">Return</a>
        </div>
        <center>
        <div id="imgKaart"></div>
        <div id="imgSign"></div>
        
    </center>

</body>
</html>
