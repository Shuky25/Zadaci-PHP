<footer>
    <p id="footerText"></p>
    <div class="container">
        <div class="row">
            <div id="formaMejl" class="col-md-6">
                <h2>Posalji mejl</h2>
                <hr>
                <form action="./php/mejl.php" method="post">
                    <div class="form-control">
                        <label for="mejl">Vas mejl: </label><br>
                        <input type="email" name="formaMejl" placeholder="Unesi mejl">
                    </div>
                    <div class="form-control">
                        <label for="poruka">Vasa poruka: </label><br>
                        <textarea name="formaPoruka" id="poruka" cols="30" rows="10"
                            placeholder="Unesi poruku"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Posalji mejl</button>
                </form>
            </div>
            <div id="socialMedia" class="col-md-6">
                <h2>Zaprati nas</h2>
                <hr>
                <ul id="socialMediaList">
                    <li>
                        <a href="#" class="fa fa-facebook"></a>
                    </li>
                    <li>
                        <a href="#" class="fa fa-instagram"></a>
                    </li>
                    <li>
                        <a href="#" class="fa fa-youtube"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>