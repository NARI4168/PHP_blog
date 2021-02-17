<link rel="stylesheet" href="/resource/style.css">

    <aside id="styles">
        <div class="container" style="width:500px; font-size: 20px;">

            <form method="POST" action="do_send_mail.php" autocomplete="off">

                <b>Name* :
                <input type="text" name="name" required="required" style=" width:280px; height:25px; font-size:17px"><br/><br/>
                Email* :
                <input type="text" name="email" required="required" style=" width:280px; height:25px; font-size:17px"><br/><br/>
                    Subject :
                    <input type="text" name="subject" style=" width:350px; height:25px; font-size:17px"><br/><br/>
                    Content*
                        <textarea cols="40" name="content" required="required"  style=" width:500px; height:150px; font-size:17px"></textarea><br/><br/></b>

                        <input type="submit" name="submit" value="Send"></form>

                    </div>
                </aside>
